-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_institucional
CREATE DATABASE IF NOT EXISTS `sistema_institucional` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sistema_institucional`;

-- Volcando estructura para tabla sistema_institucional.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.cursos: ~9 rows (aproximadamente)
INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'QUINTO A', 'FACULTAD DE CONTABILIDAD Y AUDITORIA', '2025-01-15 06:04:00', '2025-01-19 21:20:42'),
	(3, 'DECIMO A', 'ALGEBRA', '2025-01-19 20:43:43', '2025-01-19 20:43:43'),
	(6, 'OCTAVO A', 'CIENCIAS', '2025-01-19 20:45:53', '2025-01-19 20:45:53'),
	(7, 'NOVENO A', 'CIENCIAS', '2025-01-19 20:46:08', '2025-01-19 20:46:08'),
	(9, 'DECIMO B', 'MATEMATICA', '2025-01-19 20:46:37', '2025-01-19 20:46:37'),
	(10, '2 BACH A', 'QUIMICA', '2025-01-19 22:36:39', '2025-01-19 22:36:39'),
	(11, '3 BACH A', 'QUIMICA', '2025-01-19 22:52:13', '2025-01-19 22:52:13'),
	(12, 'NIVELACIÓN', 'PSICOLOGÍA', '2025-01-20 04:34:40', '2025-01-20 04:34:40'),
	(13, 'CLINICA', '1 BACH A', '2025-01-28 01:04:52', '2025-01-28 01:04:52');

-- Volcando estructura para tabla sistema_institucional.curso_estudiante
CREATE TABLE IF NOT EXISTS `curso_estudiante` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` bigint(20) unsigned NOT NULL,
  `estudiante_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_estudiante_curso_id_foreign` (`curso_id`),
  KEY `curso_estudiante_estudiante_id_foreign` (`estudiante_id`),
  CONSTRAINT `curso_estudiante_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curso_estudiante_estudiante_id_foreign` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.curso_estudiante: ~8 rows (aproximadamente)
INSERT INTO `curso_estudiante` (`id`, `curso_id`, `estudiante_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 14, NULL, NULL),
	(2, 12, 15, NULL, NULL),
	(3, 1, 16, NULL, NULL),
	(4, 11, 17, NULL, NULL),
	(5, 1, 18, NULL, NULL),
	(6, 1, 19, NULL, NULL),
	(7, 1, 20, NULL, NULL),
	(8, 1, 21, NULL, NULL);

-- Volcando estructura para tabla sistema_institucional.estudiantes
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nota1` double(8,2) DEFAULT NULL,
  `nota2` double(8,2) DEFAULT NULL,
  `nota3` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  `estado` enum('Aprobado','Reprobado') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estudiantes_cedula_unique` (`cedula`),
  UNIQUE KEY `estudiantes_correo_unique` (`correo`),
  KEY `estudiantes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `estudiantes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.estudiantes: ~17 rows (aproximadamente)
INSERT INTO `estudiantes` (`id`, `nombre`, `cedula`, `correo`, `nota1`, `nota2`, `nota3`, `created_at`, `updated_at`, `curso_id`, `estado`) VALUES
	(1, 'ISRAEL TOALA SOLIZ', '0955088646', 'itoala92@gmail.es', 10.00, 9.00, 10.00, '2025-01-15 06:10:40', '2025-01-20 04:25:35', 1, 'Aprobado'),
	(2, 'CARLOS MARTINEZ', '0955088677', 'carlos05@gmail.com', 5.00, 7.00, 7.00, '2025-01-19 20:47:52', '2025-01-20 03:05:04', 1, 'Aprobado'),
	(3, 'ALEJO MORA SANZHEZ', '0955998775', 'alejo@outlook.com', 8.00, 10.00, 10.00, '2025-01-19 21:57:09', '2025-01-20 04:31:33', 1, 'Aprobado'),
	(6, 'JOSUE ASCENCIO JIMENEZ', '1234567894', 'jasz@gmail.com', 7.00, 7.00, 7.00, '2025-01-19 22:43:13', '2025-01-20 04:32:03', 1, 'Aprobado'),
	(9, 'MARIA BELEN', '0955849355', 'mbnel@gmail.com', 6.00, 6.00, 6.00, '2025-01-20 02:52:41', '2025-01-20 03:02:36', 1, 'Aprobado'),
	(10, 'MARTIN VARGAS', '0955788677', 'mvar@gmail.com', 5.00, 5.00, 4.00, '2025-01-20 03:49:01', '2025-01-20 04:20:10', 10, 'Aprobado'),
	(11, 'ALFREDO MENDEZ', '9878678322', 'alfm@gmail.com', NULL, NULL, NULL, '2025-01-20 04:35:35', '2025-01-20 04:35:35', NULL, NULL),
	(12, 'ALFREDO MENDEZ d', '9878678322d', 'alfm@gmail.comd', NULL, NULL, NULL, '2025-01-20 04:36:22', '2025-01-20 04:36:22', NULL, NULL),
	(13, 'ALFREDO MENDEZ df', '9878678322df', 'alfm@gmail.comdf', NULL, NULL, NULL, '2025-01-20 04:36:43', '2025-01-20 04:36:43', NULL, NULL),
	(14, 'PAULA JUCA', '7867675645', 'pjuca@gmail.com', 10.00, 10.00, 10.00, '2025-01-20 04:44:44', '2025-01-20 04:44:59', NULL, 'Aprobado'),
	(15, 'PAULA JUCA SOLIZ', '7867675643', 'pju2ca@gmail.com', 1.00, 1.00, 1.00, '2025-01-20 05:08:02', '2025-01-20 05:14:16', NULL, 'Reprobado'),
	(16, 'CARLA LARA', '1234543212', 'clara@gmail.com', 10.00, 10.00, 10.00, '2025-01-20 05:08:51', '2025-01-20 05:10:30', NULL, 'Aprobado'),
	(17, 'ANDY ORELLANA', '1234567896', 'aore@gmail.com', 10.00, 7.00, 7.00, '2025-01-20 05:09:48', '2025-01-20 05:10:03', NULL, 'Aprobado'),
	(18, 'ISRAEL TOALA SOLIZ', '0955099123', 'isa@gmail.com', 5.00, 5.00, 5.00, '2025-01-20 05:10:54', '2025-01-20 05:12:17', NULL, 'Aprobado'),
	(19, 'LAURA CONTRERAS', '1234565434', 'lcontr@gmail.com', 6.00, 7.00, 6.00, '2025-01-20 05:11:31', '2025-01-20 05:12:23', NULL, 'Aprobado'),
	(20, 'MARCELA LEON', '1234589787', 'mleon@gmail.com', 7.00, 7.00, 8.00, '2025-01-20 05:12:05', '2025-01-20 05:12:28', NULL, 'Aprobado'),
	(21, 'MICHAEL DOUGLAS', '4321123432', 'mdou@gmail.com', NULL, NULL, NULL, '2025-01-20 05:18:19', '2025-01-20 05:18:19', NULL, NULL);

-- Volcando estructura para tabla sistema_institucional.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_institucional.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_01_14_231028_create_estudiantes_table', 1),
	(6, '2025_01_14_231348_create_cursos_table', 1),
	(11, '2025_01_14_231432_create_notas_table', 2),
	(12, '2025_01_15_004248_add_curso_id_to_estudiantes_table', 3),
	(13, '2025_01_19_180155_add_notes_to_estudiantes_table', 3),
	(14, '2025_01_19_213744_rename_columns_in_estudiantes_table', 3),
	(15, '2025_01_19_234241_create_curso_estudiante_table', 4);

-- Volcando estructura para tabla sistema_institucional.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estudiante_id` bigint(20) unsigned NOT NULL,
  `curso_id` bigint(20) unsigned NOT NULL,
  `nota` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notas_estudiante_id_foreign` (`estudiante_id`),
  KEY `notas_curso_id_foreign` (`curso_id`),
  CONSTRAINT `notas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notas_estudiante_id_foreign` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.notas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_institucional.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_institucional.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_institucional.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sistema_institucional.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
