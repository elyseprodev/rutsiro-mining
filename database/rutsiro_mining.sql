-- ============================================================
-- RUTSIRO MINING LTD — database/rutsiro_mining.sql
-- Database: rutsiro_mining_db
-- PHASE 1: creates the database only. Full tables
-- (admins, minerals, mineral_images, quotation_requests,
-- customers, job_vacancies, job_applications,
-- contact_messages, company_settings) arrive in PHASE 8.
-- Import via phpMyAdmin: select DB -> Import -> this file.
-- ============================================================
CREATE DATABASE IF NOT EXISTS rutsiro_mining_db
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE rutsiro_mining_db;

-- Phase 8 will add tables here. No tables are created in Phase 1.
