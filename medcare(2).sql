-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 08:37 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` text,
  `lastname` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'erik', 'karimi', 'eriko', 'living90');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `date_time` varchar(200) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `lab_tech` int(11) DEFAULT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `message` varchar(200) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `firstname` text,
  `lastname` text,
  `specialization` varchar(245) DEFAULT NULL,
  `qualification` varchar(245) DEFAULT NULL,
  `hospital_name` varchar(200) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `firstname`, `lastname`, `specialization`, `qualification`, `hospital_name`, `username`, `password`) VALUES
(1, 'alloysius', 'kebaso', 'optician,ears,throat(ENT)', 'bachelors in MEDICINE', 'Kijabe', 'alloysius', 'alloysius');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `name` text,
  `location` varchar(100) DEFAULT NULL,
  `lab_tech` int(11) DEFAULT NULL,
  `services` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `name`, `location`, `lab_tech`, `services`) VALUES
(1, 'Tito Lab Services', 'Eldoret', 1, 'X RAY,lab tests');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tech`
--

CREATE TABLE `lab_tech` (
  `id` int(11) NOT NULL,
  `firstname` text,
  `lastname` text,
  `labname` varchar(245) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_tech`
--

INSERT INTO `lab_tech` (`id`, `firstname`, `lastname`, `labname`, `qualification`, `username`, `password`) VALUES
(1, 'titus', 'kungu', 'Tito Lab Services', 'bachelors in lab sciences', 'titus', 'titus');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message` varchar(245) DEFAULT NULL,
  `receiver_medcare` varchar(100) DEFAULT NULL,
  `sender_medcare` varchar(100) NOT NULL,
  `sender_doctor` varchar(100) DEFAULT NULL,
  `receiver_doctor` varchar(100) NOT NULL,
  `sender_labtech` varchar(245) DEFAULT NULL,
  `receiver_labtech` varchar(100) NOT NULL,
  `read_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `receiver_medcare`, `sender_medcare`, `sender_doctor`, `receiver_doctor`, `sender_labtech`, `receiver_labtech`, `read_status`) VALUES
(1, 'hello', '', '1942321077', '', '1', NULL, '', 'read'),
(2, 'test', '1942321077', '', '1', '', NULL, '', NULL),
(3, 'hello', '1942321077', '', '', '', NULL, '', 'unread'),
(4, 'how are you', '1942321077', '', '', '', NULL, '', 'unread'),
(5, 'i have fever,joint pains,vomiting', NULL, '1942321077', NULL, '1', NULL, '', 'read'),
(6, 'went to the lab', NULL, '1942321077', NULL, '1', NULL, '', 'read'),
(7, 'hey there', NULL, '1942321077', NULL, '1', NULL, '', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `medcare_no` varchar(200) NOT NULL,
  `firstname` text,
  `lastname` text,
  `regDate` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `medcare_no`, `firstname`, `lastname`, `regDate`, `username`, `password`) VALUES
(1, '1108622933', '', '', '2019-Mar-04 :11:03:53', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, '1942321077', 'alloysius', 'kebaso', '2019-Mar-04 :01:03:52', 'alloysius', '64c9f54453ddf3579164c83833f058d8'),
(3, '499847731', 'erik', 'karimi', '2019-Mar-18 :01:03:17', 'eriko', '6af31ac54ba5e95501aa47b8f8be55be');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `medcare_no` varchar(100) NOT NULL,
  `treatment_id` int(11) DEFAULT NULL,
  `drug_name` varchar(200) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `frequency` varchar(100) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `administration_type` varchar(100) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `medcare_no`, `treatment_id`, `drug_name`, `quantity`, `frequency`, `duration`, `administration_type`, `patient_id`, `doctor_id`) VALUES
(1, '1942321077', NULL, 'malaraquine', '2', '2', '28', 'tablets', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `medcare_no` varchar(100) NOT NULL,
  `treatment_id` int(11) DEFAULT NULL,
  `request_name` varchar(245) DEFAULT NULL,
  `result` varchar(245) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `lab_tech` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `medcare_no`, `treatment_id`, `request_name`, `result`, `patient_id`, `lab_tech`, `doctor_id`, `status`) VALUES
(1, '1942321077', NULL, 'x-rau of the leg', '', NULL, 1, 1, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_id` int(11) NOT NULL,
  `medcare_no` varchar(100) NOT NULL,
  `symptoms` varchar(245) DEFAULT NULL,
  `diagnosis` varchar(245) DEFAULT NULL,
  `treatment_plan` varchar(245) DEFAULT NULL,
  `treatment_date` varchar(200) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `medcare_no`, `symptoms`, `diagnosis`, `treatment_plan`, `treatment_date`, `doctor_id`, `patient_id`) VALUES
(1, '1942321077', 'headache,pain in joints,vomiting', 'malaria', '28 days', '2019/Mar/08 09:03:29', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `lab_tech` (`lab_tech`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`),
  ADD KEY `lab_tech` (`lab_tech`);

--
-- Indexes for table `lab_tech`
--
ALTER TABLE `lab_tech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_id` (`treatment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `treatment_id` (`treatment_id`),
  ADD KEY `lab_tech` (`lab_tech`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_tech`
--
ALTER TABLE `lab_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`lab_id`) REFERENCES `labs` (`lab_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`lab_tech`) REFERENCES `lab_tech` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`sender_id`) REFERENCES `lab_tech` (`id`),
  ADD CONSTRAINT `chat_ibfk_4` FOREIGN KEY (`receiver_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `chat_ibfk_5` FOREIGN KEY (`receiver_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `chat_ibfk_6` FOREIGN KEY (`receiver_id`) REFERENCES `lab_tech` (`id`);

--
-- Constraints for table `labs`
--
ALTER TABLE `labs`
  ADD CONSTRAINT `labs_ibfk_1` FOREIGN KEY (`lab_tech`) REFERENCES `lab_tech` (`id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `prescriptions_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`lab_tech`) REFERENCES `lab_tech` (`id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `treatment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
