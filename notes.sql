--
-- Database: `notes`
--
-- --------------------------------------------------------
--
-- Table structure for table `webnote`
--
CREATE TABLE `webnote` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `note` varchar(255) NOT NULL,
  `creater` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
--
-- Indexes for table `webnote`
--
ALTER TABLE `webnote`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `webnote`
--
  ALTER TABLE `webnote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;