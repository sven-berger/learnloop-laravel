<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::unprepared(<<<'SQL'
            CREATE TRIGGER prevent_primary_admin_role_delete
            BEFORE DELETE ON model_has_roles
            FOR EACH ROW
            BEGIN
                IF OLD.model_type = 'App\\Models\\User' AND OLD.model_id = 1 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Role assignment for user #1 is protected and cannot be changed.';
                END IF;
            END
        SQL);

        DB::unprepared(<<<'SQL'
            CREATE TRIGGER prevent_primary_admin_role_update
            BEFORE UPDATE ON model_has_roles
            FOR EACH ROW
            BEGIN
                IF OLD.model_type = 'App\\Models\\User' AND OLD.model_id = 1 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Role assignment for user #1 is protected and cannot be changed.';
                END IF;

                IF NEW.model_type = 'App\\Models\\User' AND NEW.model_id = 1
                   AND (NEW.role_id <> OLD.role_id OR NEW.model_type <> OLD.model_type OR NEW.model_id <> OLD.model_id) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Role assignment for user #1 is protected and cannot be changed.';
                END IF;
            END
        SQL);

        DB::unprepared(<<<'SQL'
            CREATE TRIGGER prevent_primary_admin_role_reinsert
            BEFORE INSERT ON model_has_roles
            FOR EACH ROW
            BEGIN
                IF NEW.model_type = 'App\\Models\\User' AND NEW.model_id = 1
                   AND EXISTS (
                       SELECT 1
                       FROM model_has_roles
                       WHERE model_type = 'App\\Models\\User'
                         AND model_id = 1
                   ) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Role assignment for user #1 is protected and cannot be changed.';
                END IF;
            END
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::unprepared('DROP TRIGGER IF EXISTS prevent_primary_admin_role_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS prevent_primary_admin_role_update');
        DB::unprepared('DROP TRIGGER IF EXISTS prevent_primary_admin_role_reinsert');
    }
};
