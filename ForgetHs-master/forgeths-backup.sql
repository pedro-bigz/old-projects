-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2020 às 22:12
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forgeths`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`text`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `translations`
--

INSERT INTO `translations` (`id`, `namespace`, `group`, `key`, `text`, `metadata`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'brackets/admin-ui', 'admin', 'operation.succeeded', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(2, 'brackets/admin-ui', 'admin', 'operation.failed', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(3, 'brackets/admin-ui', 'admin', 'operation.not_allowed', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(4, '*', 'admin', 'admin-user.columns.first_name', '{\"en\":\"Nome\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(5, '*', 'admin', 'admin-user.columns.last_name', '{\"en\":\"Sobrenome\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(6, '*', 'admin', 'admin-user.columns.email', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(7, '*', 'admin', 'admin-user.columns.password', '{\"en\":\"Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(8, '*', 'admin', 'admin-user.columns.password_repeat', '{\"en\":\"Confirma\\u00e7\\u00e3o de Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(9, '*', 'admin', 'admin-user.columns.activated', '{\"en\":\"Ativado\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(10, '*', 'admin', 'admin-user.columns.forbidden', '{\"en\":\"Pro\\u00edbido\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(11, '*', 'admin', 'admin-user.columns.language', '{\"en\":\"L\\u00edngua\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(12, 'brackets/admin-ui', 'admin', 'forms.select_an_option', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(13, '*', 'admin', 'admin-user.columns.roles', '{\"en\":\"Fun\\u00e7\\u00f5es\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(14, 'brackets/admin-ui', 'admin', 'forms.select_options', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(15, '*', 'admin', 'admin-user.actions.create', '{\"en\":\"Novo Colaborador\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(16, 'brackets/admin-ui', 'admin', 'btn.save', '{\"en\":\"Salvar\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(17, '*', 'admin', 'admin-user.actions.edit', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(18, '*', 'admin', 'admin-user.actions.index', '{\"en\":\"Administradores\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(19, 'brackets/admin-ui', 'admin', 'placeholder.search', '{\"en\":\"Pesquisar\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(20, 'brackets/admin-ui', 'admin', 'btn.search', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(21, '*', 'admin', 'admin-user.columns.id', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(22, '*', 'admin', 'admin-user.columns.last_login_at', '{\"en\":\"Ultimo Login as\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(23, 'brackets/admin-ui', 'admin', 'btn.edit', '{\"en\":\"Editar\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(24, 'brackets/admin-ui', 'admin', 'btn.delete', '{\"en\":\"Deletar\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(25, 'brackets/admin-ui', 'admin', 'pagination.overview', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(26, 'brackets/admin-ui', 'admin', 'index.no_items', '{\"en\":\"N\\u00e3o foi poss\\u00edvel encontrar nenhum item\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(27, 'brackets/admin-ui', 'admin', 'index.try_changing_items', '{\"en\":\"Experimente mudar os filtros ou adicionar um novo\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(28, 'brackets/admin-ui', 'admin', 'btn.new', '{\"en\":\"Novo\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(29, 'brackets/admin-ui', 'admin', 'profile_dropdown.account', '{\"en\":\"Conta\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(30, 'brackets/admin-auth', 'admin', 'profile_dropdown.profile', '{\"en\":\"Perfil\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(31, 'brackets/admin-auth', 'admin', 'profile_dropdown.password', '{\"en\":\"Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(32, 'brackets/admin-auth', 'admin', 'profile_dropdown.logout', '{\"en\":\"Sair\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(33, 'brackets/admin-ui', 'admin', 'sidebar.content', '{\"en\":\"Conte\\u00fado\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(34, 'brackets/admin-ui', 'admin', 'sidebar.settings', '{\"en\":\"Configura\\u00e7\\u00f5es\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(35, '*', 'admin', 'admin-user.actions.edit_password', '{\"en\":\"Alterar Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(36, '*', 'admin', 'admin-user.actions.edit_profile', '{\"en\":\"Editar Perfil\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(37, 'brackets/admin-auth', 'activations', 'email.line', '{\"en\":\"Voc\\u00ea est\\u00e1 recebendo este e-mail porque recebemos uma solicita\\u00e7\\u00e3o de ativa\\u00e7\\u00e3o de sua conta.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(38, 'brackets/admin-auth', 'activations', 'email.action', '{\"en\":\"Ative sua conta\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(39, 'brackets/admin-auth', 'activations', 'email.notRequested', '{\"en\":\"Se voc\\u00ea n\\u00e3o solicitou uma ativa\\u00e7\\u00e3o, nenhuma a\\u00e7\\u00e3o adicional \\u00e9 necess\\u00e1ria.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(40, 'brackets/admin-auth', 'admin', 'activations.activated', '{\"en\":\"Sua conta foi ativada!\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(41, 'brackets/admin-auth', 'admin', 'activations.invalid_request', '{\"en\":\"A requisi\\u00e7\\u00e3o falhou.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(42, 'brackets/admin-auth', 'admin', 'activations.disabled', '{\"en\":\"A ativa\\u00e7\\u00e3o est\\u00e1 desativada.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(43, 'brackets/admin-auth', 'admin', 'activations.sent', '{\"en\":\"Enviamos a voc\\u00ea um link de ativa\\u00e7\\u00e3o!\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(44, 'brackets/admin-auth', 'admin', 'passwords.sent', '{\"en\":\"Enviamos a voc\\u00ea um link de redefini\\u00e7\\u00e3o de senha!\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(45, 'brackets/admin-auth', 'admin', 'passwords.reset', '{\"en\":\"Sua senha foi alterada!\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(46, 'brackets/admin-auth', 'admin', 'passwords.invalid_token', '{\"en\":\"O token de redefini\\u00e7\\u00e3o de senha \\u00e9 inv\\u00e1lido.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(47, 'brackets/admin-auth', 'admin', 'passwords.invalid_user', '{\"en\":\"N\\u00e3o conseguimos encontrar um usu\\u00e1rio com este endere\\u00e7o de e-mail.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(48, 'brackets/admin-auth', 'admin', 'passwords.invalid_password', '{\"en\":\"A senha deve ter pelo menos seis caracteres e corresponder \\u00e0 confirma\\u00e7\\u00e3o.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(49, 'brackets/admin-auth', 'resets', 'email.line', '{\"en\":\"Voc\\u00ea est\\u00e1 recebendo este e-mail porque recebemos uma solicita\\u00e7\\u00e3o de redefini\\u00e7\\u00e3o de senha de sua conta.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(50, 'brackets/admin-auth', 'resets', 'email.action', '{\"en\":\"Redefinir Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(51, 'brackets/admin-auth', 'resets', 'email.notRequested', '{\"en\":\"Se voc\\u00ea n\\u00e3o solicitou uma redefini\\u00e7\\u00e3o de senha, nenhuma a\\u00e7\\u00e3o adicional ser\\u00e1 necess\\u00e1ria.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(52, '*', 'auth', 'failed', '{\"en\":\"Essas credenciais n\\u00e3o correspondem aos nossos registros.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(53, '*', 'auth', 'throttle', '{\"en\":\"Muitas tentativas de login. Tente novamente em :seconds segundos.\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(54, 'brackets/admin-auth', 'admin', 'activation_form.title', '{\"en\":\"Ative sua conta\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(55, 'brackets/admin-auth', 'admin', 'activation_form.note', '{\"en\":\"Enviar link de ativa\\u00e7\\u00e3o por e-mail\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(56, 'brackets/admin-auth', 'admin', 'auth_global.email', '{\"en\":\"Seu e-mail\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(57, 'brackets/admin-auth', 'admin', 'activation_form.button', '{\"en\":\"Enviar link de ativa\\u00e7\\u00e3o\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(58, 'brackets/admin-auth', 'admin', 'login.title', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(59, 'brackets/admin-auth', 'admin', 'login.sign_in_text', '{\"en\":\"Fa\\u00e7a login em sua conta\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(60, 'brackets/admin-auth', 'admin', 'auth_global.password', '{\"en\":\"Senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(61, 'brackets/admin-auth', 'admin', 'login.button', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(62, 'brackets/admin-auth', 'admin', 'login.forgot_password', '{\"en\":\"Esqueceu a senha?\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(63, 'brackets/admin-auth', 'admin', 'forgot_password.title', '{\"en\":\"Redefinir senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(64, 'brackets/admin-auth', 'admin', 'forgot_password.note', '{\"en\":\"Enviar e-mail de redefini\\u00e7\\u00e3o de senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(65, 'brackets/admin-auth', 'admin', 'forgot_password.button', '{\"en\":\"Enviar link de redefini\\u00e7\\u00e3o de senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(66, 'brackets/admin-auth', 'admin', 'password_reset.title', '{\"en\":\"Redefini\\u00e7\\u00e3o de senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(67, 'brackets/admin-auth', 'admin', 'password_reset.note', '{\"en\":\"Redefinir senha esquecida\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(68, 'brackets/admin-auth', 'admin', 'auth_global.password_confirm', '{\"en\":\"Confirma\\u00e7\\u00e3o de senha\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(69, 'brackets/admin-auth', 'admin', 'password_reset.button', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(70, '*', '*', 'Manage access', '{\"en\":\"Colaboradores\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(71, '*', '*', 'Translations', '{\"en\":\"Tradu\\u00e7\\u00f5es\"}', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(72, '*', '*', 'Configuration', '[]', NULL, '2020-12-12 22:10:38', '2020-12-13 00:03:18', NULL),
(73, 'brackets/admin-ui', 'admin', 'media_uploader.max_number_of_files', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(74, 'brackets/admin-ui', 'admin', 'media_uploader.max_size_pre_file', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(75, 'brackets/admin-ui', 'admin', 'media_uploader.private_title', '{\"en\":\"Os arquivos n\\u00e3o s\\u00e3o acess\\u00edveis ao p\\u00fablico\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(76, 'brackets/admin-ui', 'admin', 'page_title_suffix', '{\"en\":\"ForgetHS\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(77, 'brackets/admin-ui', 'admin', 'footer.powered_by', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(78, 'brackets/admin-translations', 'admin', 'title', '{\"en\":\"Tradu\\u00e7\\u00f5es\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(79, 'brackets/admin-translations', 'admin', 'index.all_groups', '{\"en\":\"Todos os grupos\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(80, 'brackets/admin-translations', 'admin', 'index.edit', '{\"en\":\"Editar tradu\\u00e7\\u00e3o\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(81, 'brackets/admin-translations', 'admin', 'index.default_text', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(82, 'brackets/admin-translations', 'admin', 'index.translation', '{\"en\":\"Tradu\\u00e7\\u00e3o\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(83, 'brackets/admin-translations', 'admin', 'index.translation_for_language', '{\"en\":\"Digite uma tradu\\u00e7\\u00e3o para o idioma :locale\"}', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(84, 'brackets/admin-translations', 'admin', 'import.title', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(85, 'brackets/admin-translations', 'admin', 'import.notice', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(86, 'brackets/admin-translations', 'admin', 'import.upload_file', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(87, 'brackets/admin-translations', 'admin', 'import.choose_file', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(88, 'brackets/admin-translations', 'admin', 'import.language_to_import', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(89, 'brackets/admin-translations', 'admin', 'fields.select_language', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(90, 'brackets/admin-translations', 'admin', 'import.do_not_override', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(91, 'brackets/admin-translations', 'admin', 'import.conflict_notice_we_have_found', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(92, 'brackets/admin-translations', 'admin', 'import.conflict_notice_translations_to_be_imported', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(93, 'brackets/admin-translations', 'admin', 'import.conflict_notice_differ', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(94, 'brackets/admin-translations', 'admin', 'fields.group', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(95, 'brackets/admin-translations', 'admin', 'fields.default', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(96, 'brackets/admin-translations', 'admin', 'fields.current_value', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(97, 'brackets/admin-translations', 'admin', 'fields.imported_value', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(98, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(99, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice_update', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(100, 'brackets/admin-translations', 'admin', 'index.export', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(101, 'brackets/admin-translations', 'admin', 'export.notice', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(102, 'brackets/admin-translations', 'admin', 'export.language_to_export', '[]', NULL, '2020-12-12 22:29:43', '2020-12-13 00:03:18', NULL),
(103, 'brackets/admin-translations', 'admin', 'btn.export', '{\"en\":\"Exportar\"}', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(104, 'brackets/admin-translations', 'admin', 'index.title', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(105, 'brackets/admin-translations', 'admin', 'btn.import', '{\"en\":\"Importar\"}', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(106, 'brackets/admin-translations', 'admin', 'btn.re_scan', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(107, 'brackets/admin-translations', 'admin', 'fields.created_at', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(108, 'brackets/admin-translations', 'admin', 'index.no_items', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(109, 'brackets/admin-translations', 'admin', 'index.try_changing_items', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(110, '*', '*', 'Close', '[]', NULL, '2020-12-12 22:29:44', '2020-12-13 00:03:18', NULL),
(111, '*', 'admin', 'loja-local.title', '{\"en\":\"Endere\\u00e7os\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(112, '*', 'admin', 'loja-local.columns.logradouro', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(113, '*', 'admin', 'loja-local.columns.numero', '{\"en\":\"N\\u00famero\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(114, '*', 'admin', 'loja-local.columns.bairro', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(115, '*', 'admin', 'loja-local.columns.cidade', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(116, '*', 'admin', 'loja-local.columns.uf', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(117, '*', 'admin', 'loja-local.columns.cep', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(118, '*', 'admin', 'loja-local.columns.activated', '{\"en\":\"Ativado\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(119, '*', 'admin', 'loja-local.actions.create', '{\"en\":\"Novo local\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(120, '*', 'admin', 'loja-local.actions.edit', '{\"en\":\"Editar :name\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(121, '*', 'admin', 'loja-local.actions.index', '{\"en\":\"Endere\\u00e7os\"}', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(122, '*', 'admin', 'loja-local.columns.id', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(123, 'brackets/admin-ui', 'admin', 'listing.selected_items', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(124, 'brackets/admin-ui', 'admin', 'listing.check_all_items', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(125, 'brackets/admin-ui', 'admin', 'listing.uncheck_all_items', '[]', NULL, '2020-12-12 22:54:24', '2020-12-13 00:03:18', NULL),
(126, '*', 'admin', 'categoria.columns.tipo', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(127, '*', 'admin', 'categoria.columns.setor', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(128, '*', 'admin', 'categoria.columns.activated', '{\"en\":\"Ativado\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(129, '*', 'admin', 'categoria.actions.create', '{\"en\":\"Nova Categoria\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(130, '*', 'admin', 'categoria.actions.edit', '{\"en\":\"Editar :name\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(131, '*', 'admin', 'categoria.actions.index', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(132, '*', 'admin', 'categoria.columns.id', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(133, '*', 'admin', 'estoque.columns.name', '{\"en\":\"Nome\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(134, '*', 'admin', 'estoque.columns.price', '{\"en\":\"Pre\\u00e7o\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(135, '*', 'admin', 'estoque.columns.amount', '{\"en\":\"Quantidade\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(136, '*', 'admin', 'estoque.columns.places', '{\"en\":\"Local f\\u00edsico\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(137, '*', 'admin', 'estoque.columns.category', '{\"en\":\"Categoria\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(138, '*', 'admin', 'estoque.columns.cor', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(139, '*', 'admin', 'estoque.columns.activated', '{\"en\":\"Ativado\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(140, '*', 'admin', 'estoque.columns.description', '{\"en\":\"Descri\\u00e7\\u00e3o\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(141, '*', 'admin', 'estoque.actions.create', '{\"en\":\"Novo Produto\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(142, '*', 'admin', 'estoque.actions.edit', '{\"en\":\"Editar :name\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(143, '*', 'admin', 'estoque.actions.index', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(144, '*', 'admin', 'estoque.columns.id', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(145, '*', 'admin', 'categoria.title', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(146, '*', 'admin', 'estoque.title', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(147, '*', 'admin', 'oferta.title', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(148, '*', 'admin', 'oferta.columns.id_estoque', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(149, '*', 'admin', 'oferta.columns.desconto', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(150, '*', 'admin', 'oferta.columns.description', '{\"en\":\"Descri\\u00e7\\u00e3o\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(151, '*', 'admin', 'oferta.columns.min_user_lvl', '{\"en\":\"N\\u00edvel Usu\\u00e1rio (min)\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(152, '*', 'admin', 'oferta.columns.activated', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(153, '*', 'admin', 'oferta.columns.data_inicio', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(154, 'brackets/admin-ui', 'admin', 'forms.select_date_and_time', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(155, '*', 'admin', 'oferta.columns.data_fim', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(156, '*', 'admin', 'oferta.actions.create', '{\"en\":\"Nova Oferta\"}', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(157, '*', 'admin', 'oferta.actions.edit', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(158, '*', 'admin', 'oferta.actions.index', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(159, '*', 'admin', 'oferta.columns.id', '[]', NULL, '2020-12-12 23:33:28', '2020-12-13 00:03:18', NULL),
(160, 'brackets/admin-ui', 'admin', 'sidebar.admin', '{\"en\":\"Administrador\"}', NULL, '2020-12-13 00:03:15', '2020-12-13 00:04:29', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_namespace_index` (`namespace`),
  ADD KEY `translations_group_index` (`group`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
