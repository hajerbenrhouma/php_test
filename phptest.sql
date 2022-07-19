CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `articles` ADD PRIMARY KEY (`id`);

INSERT INTO `articles` (`id`, `title`, `description`) VALUES
(1, 'PHP 8.0.14 Released!', 'The PHP development team announces the immediate availability of PHP 8.0.14. This is a bug fix release.\r\n\r\nAll PHP 8.0 users are encouraged to upgrade to this version.\r\n\r\nFor source downloads of PHP 8.0.14 please visit our downloads page, Windows source and binaries can be found on windows.php.net/download/. The list of changes is recorded in the ChangeLog.'),
(2, 'PHP 8.1.1 Released!', 'Over 120 people helped shape PHP 8.1! Here are some posters to celebrate our loud!');
