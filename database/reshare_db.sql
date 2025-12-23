SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` enum('Buku','Elektronik','Pakaian','Rumah Tangga') NOT NULL,
  `kondisi` enum('Seperti Baru','Bagus','Layak Pakai') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('available','requested','taken') DEFAULT 'available',
  `taken_by` int(11) DEFAULT NULL,
  `taken_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `item_requests` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `purpose` enum('Pekerjaan','Pendidikan','Rumah Tangga','Lainnya') NOT NULL,
  `alasan` text NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_events_user` (`user_id`);

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_items_user` (`user_id`),
  ADD KEY `idx_items_status` (`status`),
  ADD KEY `idx_items_taken_by` (`taken_by`);

ALTER TABLE `item_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_req_item` (`item_id`),
  ADD KEY `fk_req_user` (`requester_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

ALTER TABLE `item_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_taken_by` FOREIGN KEY (`taken_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_items_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `item_requests`
  ADD CONSTRAINT `fk_req_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_req_user` FOREIGN KEY (`requester_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;
