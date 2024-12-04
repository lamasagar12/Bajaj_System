-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2024 at 04:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bajajadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` mediumtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `history` mediumtext NOT NULL,
  `image2` varchar(255) NOT NULL,
  `technology` mediumtext NOT NULL,
  `image3` varchar(255) NOT NULL,
  `community` mediumtext NOT NULL,
  `image4` varchar(255) NOT NULL,
  `commitment` mediumtext NOT NULL,
  `image5` varchar(255) NOT NULL,
  `visitus` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `image`, `about`, `image1`, `history`, `image2`, `technology`, `image3`, `community`, `image4`, `commitment`, `image5`, `visitus`, `status`) VALUES
(2, 'aboutus1.jpg', 'Welcome to Bajaj Bhaktapur, your premier destination for all things Bajaj motorcycles in Nepal. Founded with a vision to revolutionize the motorcycle industry in Bhaktapur and beyond, we have become synonymous with quality, reliability, and innovation in the Nepalese biking community. With a rich history, commitment to excellence, and a passion for serving our customers, Bajaj Bhaktapur is proud to be your trusted partner on the road.', 'img2.jpg', 'Bajaj Bhaktapur has been a cornerstone of the Nepalese motorcycle industry for over [number of years] years. Our journey began in [year of establishment] when we opened our doors with a simple yet ambitious goal: to provide riders with access to world-class motorcycles and exceptional service right here in Bhaktapur. Since then, we have grown from strength to strength, expanding our reach, diversifying our offerings, and earning the trust and loyalty of countless customers along the way.', 'exctech.jpg', 'At Bajaj Bhaktapur, we believe in the power of innovation to drive progress and shape the future of motorcycling. That\'s why we are proud to offer the latest advancements in Bajaj motorcycles to our customers. From revolutionary engine technology to cutting-edge safety features, our bikes are engineered to deliver unmatched performance, reliability, and comfort on every ride. Whether you\'re commuting to work, embarking on a weekend adventure, or exploring rugged terrain, you can count on your Bajaj motorcycle from Bajaj Bhaktapur to exceed your expectations.', 'history_img6.jpg', 'As a responsible member of Nepal\'s vibrant biking community, Bajaj Bhaktapur is committed to making a positive impact in the lives of riders across the country. Through our extensive network of dealerships, service centers, and community initiatives, we strive to promote safe riding practices, foster a sense of camaraderie among riders, and support the growth and development of Nepal\'s motorcycle culture. Additionally, we are actively involved in various social and environmental initiatives aimed at improving road safety, preserving natural resources, and enhancing the well-being of our communities.', 'Dts.jpg', 'At Bajaj Bhaktapur, customer satisfaction is more than just a goal – it\'s our guiding principle. We are dedicated to providing an unparalleled shopping and service experience to every customer who walks through our doors. Our friendly and knowledgeable staff are here to assist you every step of the way, from helping you find the perfect motorcycle to offering expert maintenance and repair services. With our unwavering commitment to quality, integrity, and customer care, we strive to exceed your expectations and earn your trust as your preferred partner in all your motorcycle needs.', '1000_F_507801258_jROzwlX4DE5JrAftDlsupWs0kv5Y7bDy.jpg', 'Ready to experience the Bajaj Bhaktapur difference for yourself? We invite you to visit our showroom and service center today. Explore our extensive selection of Bajaj motorcycles, accessories, and merchandise, meet our dedicated team, and discover why Bajaj Bhaktapur is the preferred choice for riders across Nepal. Whether you\'re a seasoned enthusiast or a first-time buyer, we\'re here to help you find the perfect ride and embark on your next great adventure on two wheels.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(25) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not_ban,1=ban',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `is_ban`, `created_at`) VALUES
(12, 'Suman', 'lama', 'lama@suman.com', '$2y$10$hhYdYneqOoGUotWoI29hfunh7HCeqY/g1ykSMhLZODeU4Kae0sXfO', '986514388', 0, '2024-05-10 17:13:16'),
(14, 'sagar', 'lama', 'lama@sagar.com', '$2y$10$otU45zLrhkyApxrUjSICNOzIdhtY2LmqFr0FEO4cMQCjw0tSYmHw2', '9860463468', 1, '2024-05-12 03:04:16'),
(15, 'Padma', 'Bajra', 'padma@bajra.com', '$2y$10$v/Oiw3holuaxlYoTigqcl.bSteFIkLYxPgLM0dfuOTwBGzMCmtkca', '986514388', 0, '2024-05-31 09:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `bike_name` varchar(255) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `booking_date`, `bike_name`, `status`) VALUES
(6, 'Sagar Waiba', 'lama@suman.com', '+01 44546657', '2024-05-29', 'Dominar 400 Dual ABS BS6', '0'),
(7, 'Rabin', 'lama@rabin.com', '986514388', '2024-05-28', 'Pulsar 220F ABS', '0'),
(19, 'Nirajan Tamang', 'lama@suman.com', '957527358', '2024-05-30', 'Pulsar 150', 'approved'),
(20, 'Sagar Waiba', 'lama@sagar.com', '957527358', '2024-05-31', 'PULSAR NS 125 BS6', 'approved'),
(21, 'padma', 'pada@bajra.com', '957527358', '2024-05-31', 'PULSAR 150 TWIN DISC - NEW 2021 EDITION', 'approved'),
(24, 'SudipRaut', 'Raut@sudip.com', '9780123454', '2024-06-09', 'Pulsar 150', 'approved'),
(25, 'Shirish', 'giri@shirish', '998675324', '2024-06-07', 'DISCOVER 125 DISC', 'approved'),
(26, 'SunitaRaut', 'Sunita@raut.com', '986514388', '2024-06-11', 'DISCOVER 125 DISC', 'pending'),
(27, 'Sudip', 'sudip@gmail.com', '635285383', '2024-06-05', 'DISCOVER 125 DISC', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(121) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `description`, `status`) VALUES
(1, 'Sin_ti_tulo-5-02_1x.png', 'Discover', 'The Bajaj Discover is a reliable and fuel-efficient commuter motorcycle series manufactured by Bajaj Auto in India, renowned for its comfortable ride and affordability. With various engine options and modern styling, it\'s a popular choice for daily commut', 0),
(2, '347775874_1456947498443940_7797868952086512569_n-removebg-preview.png', 'Dominar', 'The Dominar is a premium sports tourer motorcycle manufactured by Bajaj Auto in India. It\'s known for its powerful engine, advanced features like LED lighting and digital instrumentation, comfortable riding ergonomics, and robust build quality. The Domina', 0),
(3, '855d5a111542773.Y3JvcCw5MDAsNzAzLDAsOTg-removebg-preview.png', 'Avenger', 'The Avenger is a cruiser motorcycle series manufactured by Bajaj Auto in India, renowned for its classic cruiser styling, comfortable riding position, and affordable pricing. Available in various engine displacements and styles, the Avenger lineup caters ', 0),
(4, '612oIWQ7xBL._AC_UF1000_1000_QL80_-removebg-preview.png', 'Pulsar', 'The Pulsar is another iconic motorcycle series produced by Bajaj Auto in India, known for its sporty design, powerful performance, and innovative features. With a range of models catering to different segments of riders, the Pulsar lineup offers a thrilli', 0),
(5, 'ar-stickers-pulsar-200-ns-28757-removebg-preview.png', 'Pulsar NS', 'The Pulsar NS (Naked Sport) series is a line of naked streetfighter motorcycles produced by Bajaj Auto in India. Known for their aggressive styling, powerful performance, and advanced features, the Pulsar NS bikes offer a thrilling riding experience. With', 0),
(18, 'images-removebg-preview.png', 'Platina', 'Platina 100 ES in Nepal has been designed to achieve maximum fuel efficiency with the convenience of modern features like alloy wheels, solid build, SNS suspension and its most unique attribute – the push button Electric Start.', 0),
(19, 'Pulsar-N250-logo-black2.png', 'Pulsar N', 'The Pulsar N series by Bajaj Auto is a range of sporty motorcycles known for their aggressive design, powerful engines, and advanced features. This lineup includes models like the NS200, NS160, and NS125, each catering to different rider needs. They are e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=active,1=disable',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `image`, `name`, `description`, `status`, `created_at`) VALUES
(4, 'ns.png', 'Pulsar NS', 'Absolutely, Bajaj Auto Limited has indeed carved a significant niche for itself in the Indian automotive industry. Their commitment to innovation, reliability, and affordability has made them a favorite among consumers. Whether it\'s their sleek sport', 0, '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `opentime` varchar(6) NOT NULL,
  `closetime` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`, `email`, `phone`, `website`, `opentime`, `closetime`, `status`) VALUES
(3, 'Suryabinayak ,Bhaktapur', 'bajaj23bhaktapur@gmail.com', 986514388, 'www.bajaj23bhaktapur.com', '6am', '6pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Nirajan Tamang', 'You can customize this script further based on your specific requirements, such as adding additional form validation, sending the email using a library like PHPMailer for better control and error handling, or integrating with a database to store form subm', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(45) NOT NULL,
  `image` varchar(121) NOT NULL,
  `name` varchar(121) NOT NULL,
  `price` int(12) NOT NULL,
  `category_id` varchar(121) NOT NULL,
  `engine_capacity` int(12) NOT NULL,
  `max_power` int(12) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `price`, `category_id`, `engine_capacity`, `max_power`, `description`, `status`, `added_at`) VALUES
(2, 'avenger1.png', 'Avenger 220 Cruise', 412900, '3', 220, 353, 'With enough torque and muscle to dominate every twist and turn, the Avenger 200 Cruise gives you joy in every journey.', '1', '2024-05-12'),
(4, 'pulsar-150.png', 'Pulsar 150', 299000, '4', 150, 142, 'Designed to outperform in city challenges, the Pulsar 150 in Nepal is powered by a twin-spark DST-i engine for better power delivery, practicality from improved mileage, a durable build and advanced features that easily put you ahead of competition.', '0', '2024-05-12'),
(6, '220blue.png', 'Pulsar 220F ABS', 399900, '4', 220, 21412, 'One look at the 220 F\'s, sporty, aggressive & muscular build and you’re pegged as riding the toughest street bike around.', '0', '2024-05-12'),
(7, 'n2501.png', 'Pulsar N250 Dual ABS BS6', 449900, '19', 250, 241, 'Aggressive muscular styling that lets you stand out. An advanced 250cc, 4-stroke Fuel Injected engine, that offers power on tap. Some of the key features includes: Infinity Display, Stylish split seats, Nitrox Mono-shock Suspension, Dual channel ABS, USB mobile charging, DRL Light & Tubeless Radial Tyres.', '0', '2024-05-22'),
(8, '220red.png', 'PULSAR 150 TWIN DISC - NEW 2021 EDITION', 318900, '4', 150, 124, 'Taste the Adrenaline with the all New 2021 Edition Pulsar TD in Nepal. Take total Control with the Pulsar 150cc Twin Spark DTSi Engine & Twin Disc Brakes.', '0', '2024-05-22'),
(9, 'Discover-125-Disc-2021-Edition.png', 'DISCOVER 125 DISC', 240900, '1', 125, 97, 'The New 2021 Edition Discover 125 Disc in Nepal offers, better braking with a powerful yet economical ride to ensure you get your daily dose of fun.', '1', '2024-05-22'),
(10, 'Platina-100ES-2022.png', 'PLATINA 100ES 2022', 205900, '18', 100, 60, 'Platina 100 ES in Nepal has been designed to achieve maximum fuel efficiency with the convenience of modern features like alloy wheels, solid build, SNS suspension and its most unique attribute – the push button Electric Start.', '0', '2024-05-29'),
(11, 'Pulsar125NS-Revised-List.png', 'PULSAR NS 125 BS6', 287000, '5', 125, 76, 'Perform better than everyone else on the streets. The most powerful beast in its class, All New Pulsar 125 cc (Latest BS6 Complaint) in Nepal with DTS-i engine generates 8.82 kW (12 PS) and 11 Nm of torque.', '0', '2024-05-29'),
(12, 'dominar-250.png', 'DOMINAR 250 BS6', 549000, '2', 250, 123, 'Welcome to the world of touring.\r\nDon’t Hold Back. Ride through the thrilling roads of Nepal with Dominar 250, the all-new sports tourer. Dominar 250 CC is a new value-added to the lot, to expand the inheritance of the mighty sports tourer.', '0', '2024-05-29'),
(13, 'D400-1640-x-997-New.png', 'DOMINAR 400 BS6', 599900, '2', 400, 123, 'Live the best touring experiences riding with the all upgraded Edition Dominar 400 BS6 Model in Nepal with Dual channel ABS. A bike with purely muscular built appearance like no other.', '0', '2024-05-29'),
(14, 'Pulsar N160 Model-2022.png', 'PULSAR N160 DUAL ABS', 393900, '4', 160, 78, 'Introducing Pulsar N160 in Nepal in dynamic premium metallised dual colours. Darker in the front & lighter towards the rear, it emphasizes the contours of the beast.', '0', '2024-05-29'),
(15, 'Pulsar NS160 BS6.png', 'PULSAR 160 NS ABS', 330900, '5', 160, 121, 'Enjoy best-in-Class 160cc Pulsar Motorcycles in Nepal [2021 Edition] with Twin Spark DTSi Engine, Twin Discs & Wider Wheels & Quick Single Channel ABS, the new generation Pulsar.', '0', '2024-05-29'),
(16, '1640x997px_NS200-NEW_Black.png', 'NS200 FI DUAL ABS BS6', 425900, '5', 200, 121, 'All the same specs and features made in the same DNA of NS 200 this model comes with its unique colors and a FI system embeds.', '0', '2024-06-01'),
(17, '5.png', 'Pulsar 150 SD', 299000, '', 150, 21, 'The Bajaj Pulsar 150 is one of the greatest selling 150cc motorbikes. The Pulsar is an exceptionally famous Nepal given the right cost and an enthusiastic 150cc motor. Bajaj as of late refreshed the 150 which contains Neon, Single Disk, and Twin Disk variations. Accordingly, you can now additionally get a Pulsar 150 with circle brakes on the two closures. Regardless of a more seasoned look, the Pulsar stays the top-of-the-line 150cc bike in light of its incentive for cash value.', '0', '2024-06-01'),
(18, '5.png', 'Pulsar 150 SD', 299000, '4', 150, 21, 'The Bajaj Pulsar 150 is one of the greatest selling 150cc motorbikes. The Pulsar is an exceptionally famous Nepal given the right cost and an enthusiastic 150cc motor. Bajaj as of late refreshed the 150 which contains Neon, Single Disk, and Twin Disk variations. Accordingly, you can now additionally get a Pulsar 150 with circle brakes on the two closures. Regardless of a more seasoned look, the Pulsar stays the top-of-the-line 150cc bike in light of its incentive for cash value.', '1', '2024-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(7000) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=available,1-not_'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `name`, `description`, `status`) VALUES
(1, 'Bajaj Exchange with Lowest EMI.jpg', 'Exchanging Offers', 'Upgrade Your Ride with Bajaj Bhaktapur’s Exciting Exchange Offers!\r\n\r\nAre you ready to experience the thrill of riding a brand-new Bajaj motorcycle? At Bajaj Bhaktapur, we bring you an incredible opportunity to upgrade your old bike with our exclusive exchange offers!\r\n\r\nWhy Choose Bajaj Bhaktapur’s Exchange Program?\r\n\r\n1. Unbeatable Value: Get the best market value for your old motorcycle. Our exchange program ensures you receive top-notch deals, making your upgrade \r\n     journey more affordable and worthwhile.\r\n\r\n2. Exciting Discounts: Enjoy substantial cash discounts on a wide range of new Bajaj bikes. Whether you\'re eyeing the sporty Pulsar or the reliable Platina, \r\n     our exchange offers make it easier to own the Bajaj bike of your dreams.\r\n\r\n3. Additional Benefits: As a part of our exchange program, you can also avail yourself of various perks such as free accessories, servicing packages, and \r\n    attractive financing options. We’re here to make your upgrade as seamless and beneficial as possible.\r\n\r\nHow Does It Work?\r\n\r\n▪️  Visit Us: Drop by Bajaj Bhaktapur with your old motorcycle. Our friendly staff will guide you through the exchange process.\r\n\r\n▪️  Evaluation: Our experts will evaluate your bike and provide a fair market value. We ensure transparency and the best possible offer for your old bike.\r\n\r\n▪️  Upgrade: Choose your new Bajaj motorcycle from our extensive range. Enjoy the latest features, superior performance, and the unmatched reliability that \r\n    Bajaj is known for.\r\n\r\n▪️  Drive Away: Complete the exchange process, avail yourself of the exciting discounts and benefits, and ride away on your brand-new Bajaj bike!', 1),
(3, 'peradic-01.jpg', 'Routine Maintenance', 'Keep Your Bajaj Running Smoothly with Routine Maintenance at Bajaj Bhaktapur\r\n\r\nAt Bajaj Bhaktapur, we understand the importance of regular maintenance to keep your motorcycle performing at its best. Our comprehensive routine maintenance services are designed to ensure your Bajaj bike remains reliable, efficient, and safe on the road.\r\n\r\nWhy Choose Bajaj Bhaktapur for Routine Maintenance?\r\n\r\nExpert Technicians: Our team of skilled and certified technicians are experts in Bajaj motorcycles. They are trained to handle all aspects of bike maintenance with precision and care.\r\n\r\nGenuine Parts: We use only genuine Bajaj parts and accessories to ensure the longevity and optimal performance of your motorcycle. Quality and authenticity are guaranteed in every service.\r\n\r\nComprehensive Services: Our routine maintenance package includes a thorough inspection and servicing of your bike’s key components. From oil changes and brake adjustments to tire checks and engine tuning, we cover it all to keep your ride smooth and trouble-free.\r\n\r\nState-of-the-Art Facilities: Our service center is equipped with the latest tools and technology to provide top-notch maintenance for your Bajaj motorcycle. We adhere to the highest standards of service quality and efficiency.\r\n\r\nCustomer Convenience: At Bajaj Bhaktapur, we prioritize your convenience. Enjoy quick and hassle-free service with our well-organized scheduling system. We ensure your bike is serviced promptly so you can get back on the road without delay.\r\n\r\nRoutine Maintenance Services Include:\r\n\r\n▪️ Oil and Filter Change: Regular oil changes to keep your engine running smoothly.\r\n▪️Brake Inspection and Adjustment: Ensuring your brakes are responsive and effective.\r\n▪️Tire Inspection and Rotation: Checking tire pressure and tread for optimal grip and safety.\r\n▪️Engine Tuning and Diagnostics: Fine-tuning your engine for peak performance.\r\n▪️Battery Check and Replacement: Ensuring your battery is charged and functioning properly.\r\n▪️Chain Lubrication and Adjustment: Maintaining proper chain tension and lubrication for a smooth ride.\r\n▪️Book Your Maintenance Appointment Today!\r\n\r\nKeep your Bajaj motorcycle in top condition with routine maintenance at Bajaj Bhaktapur. Schedule your service appointment today and experience the peace of mind that comes with professional care and attention to detail. Your bike deserves the best – and so do you!\r\n\r\nVisit us at Bajaj Bhaktapur or call us to book your routine maintenance service. Let us help you keep your ride running smoothly and safely for miles to come.', 1),
(4, 'The-making-of-India’s-patriotic-motorcycle-Bajaj-V15-78491.webp', 'Repairs', 'Get Your Bajaj Motorcycle Back on the Road with Expert Repair Services at Bajaj Bhaktapur\r\n\r\nEncountered a problem with your Bajaj motorcycle? Don\'t let it slow you down! At Bajaj Bhaktapur, we offer professional repair services to address any issues and get you back on the road with confidence.\r\n\r\nWhy Trust Bajaj Bhaktapur for Motorcycle Repairs?\r\n\r\nSkilled Technicians: Our team of experienced technicians specializes in Bajaj motorcycles. They have the expertise and knowledge to diagnose and repair any issue efficiently and effectively.\r\n\r\nDiagnostic Tools: Equipped with state-of-the-art diagnostic tools, we can quickly identify the root cause of your motorcycle\'s problem. This allows us to provide accurate solutions and minimize downtime.\r\n\r\nGenuine Parts: We use only genuine Bajaj spare parts to ensure the quality and longevity of our repairs. With authentic components, you can trust that your motorcycle will perform optimally after the repair.\r\n\r\nComprehensive Services: From minor fixes to major overhauls, we handle all types of repairs at Bajaj Bhaktapur. Whether it\'s an engine issue, electrical problem, or mechanical malfunction, we\'ve got you covered.\r\n\r\nTransparent Communication: We believe in transparent communication with our customers. Before proceeding with any repairs, we\'ll provide a detailed explanation of the problem and the proposed solution. You\'ll always know what to expect.\r\n\r\nOur Repair Services Include:\r\n\r\nEngine Overhaul: Comprehensive repairs to address issues with the engine\'s performance or components.\r\nElectrical System Repair: Diagnosing and fixing electrical problems such as faulty wiring, lighting issues, and ignition problems.\r\nBrake and Suspension Repair: Restoring the functionality and safety of your motorcycle\'s braking and suspension systems.\r\nBodywork and Paint: Repairing scratches, dents, and other cosmetic damage to restore your bike\'s appearance.\r\nTransmission and Gearbox Repair: Addressing issues with gear shifting, clutch operation, and transmission performance.\r\nExperience Reliable Repair Services at Bajaj Bhaktapur\r\n\r\nDon\'t let motorcycle problems hold you back. Trust the experts at Bajaj Bhaktapur to provide reliable repair services and get your Bajaj motorcycle back in top condition. With our commitment to quality and customer satisfaction, you can rest assured that your bike is in good hands.\r\n\r\nVisit us at Bajaj Bhaktapur or contact us to schedule your repair appointment. Let us help you get back on the road safely and smoothly.', 1),
(5, 'The-making-of-India’s-patriotic-motorcycle-Bajaj-V15-78487.webp', 'Bike Fitting', 'Experience Comfort and Performance with Professional Bike Fitting at Bajaj Bhaktapur\r\n\r\nAre you looking to optimize your riding experience and maximize comfort on your Bajaj motorcycle? Look no further! At Bajaj Bhaktapur, we offer expert bike fitting services to ensure your motorcycle fits you perfectly, allowing you to ride with confidence and enjoyment.\r\n\r\nWhy Choose Bajaj Bhaktapur for Bike Fitting?\r\n\r\nPersonalized Approach: Our bike fitting process begins with a thorough assessment of your riding style, body dimensions, and preferences. We take the time to understand your needs and tailor the fitting to suit you perfectly.\r\n\r\nExpert Guidance: Our trained technicians have extensive experience in bike fitting and ergonomics. They will provide expert guidance and recommendations to optimize your riding position for comfort, efficiency, and performance.\r\n\r\nCustomization Options: Whether you ride a Bajaj commuter bike, sportbike, or cruiser, we offer a range of customization options to fine-tune your motorcycle\'s fit. From adjusting handlebar height to optimizing seat position, we ensure every aspect of your bike is tailored to your needs.\r\n\r\nEnhanced Comfort: A properly fitted bike not only enhances comfort but also reduces the risk of discomfort, fatigue, and injury during long rides. Our bike fitting services are designed to promote better posture, reduce strain, and improve overall comfort on the road.\r\n\r\nOur Bike Fitting Process Includes:\r\n\r\nBody Measurements: We take precise measurements of your body dimensions to determine the ideal riding position.\r\nAdjustments: Based on your measurements and preferences, we make necessary adjustments to the handlebars, seat, footpegs, and other components to optimize your bike\'s fit.\r\nTest Ride: Once the adjustments are made, we invite you to take a test ride to ensure everything feels comfortable and natural.\r\nFine-Tuning: If needed, we make additional adjustments to further refine the fit until you\'re completely satisfied.\r\nExperience the Difference of Proper Bike Fitting at Bajaj Bhaktapur\r\n\r\nDon\'t settle for a one-size-fits-all approach to riding. Invest in a professional bike fitting at Bajaj Bhaktapur and experience the difference it can make to your comfort and performance on the road. Whether you\'re a casual rider or a seasoned enthusiast, we\'re here to help you enjoy every moment of your ride.\r\n\r\nVisit us at Bajaj Bhaktapur or contact us to schedule your bike fitting appointment. Let us help you find the perfect fit for your Bajaj motorcycle and elevate your riding experience to new heights.', 1),
(6, '2-250x250.webp', 'Professional Cleaning', 'Restore Your Bajaj Motorcycle\'s Shine with Professional Cleaning Services at Bajaj Bhaktapur\r\n\r\nIs your Bajaj motorcycle looking dull and dirty after hours on the road? Revive its beauty and maintain its pristine condition with professional cleaning services at Bajaj Bhaktapur. Our expert cleaners will give your bike the care and attention it deserves, leaving it sparkling clean and ready to turn heads wherever you ride.\r\n\r\nWhy Choose Bajaj Bhaktapur for Professional Cleaning?\r\n\r\nSpecialized Cleaning Techniques: Our cleaning professionals are trained in specialized techniques to safely and effectively clean every part of your motorcycle, from the engine to the bodywork. We use premium cleaning products that are gentle on surfaces yet powerful enough to remove stubborn dirt and grime.\r\n\r\nAttention to Detail: We take pride in our meticulous attention to detail. Every inch of your motorcycle will be thoroughly cleaned, ensuring no dirt or debris is left behind. From intricate components to hard-to-reach areas, we leave no stone unturned in our quest to restore your bike\'s shine.\r\n\r\nProtective Measures: In addition to cleaning, we also offer protective treatments to safeguard your motorcycle against environmental damage. From waxing and polishing to rust prevention, we\'ll help keep your bike looking like new for years to come.\r\n\r\nConvenience: Don\'t waste your valuable time and effort on DIY cleaning. Let our professionals handle the job while you sit back and relax. With our convenient cleaning services, you can enjoy a spotless motorcycle without the hassle of doing it yourself.\r\n\r\nOur Professional Cleaning Services Include:\r\n\r\nExterior Cleaning: Remove dirt, grime, and road debris from the bodywork, wheels, and exhaust pipes.\r\nEngine Detailing: Clean and degrease the engine to restore its shine and enhance performance.\r\nChrome Polishing: Polish chrome surfaces to a mirror-like finish for added visual appeal.\r\nInterior Cleaning: Clean and vacuum the interior compartments to remove dust and debris.\r\nProtective Coatings: Apply protective coatings to enhance shine and protect against UV damage, water spots, and more.\r\nExperience the Difference of Professional Cleaning at Bajaj Bhaktapur\r\n\r\nTreat your Bajaj motorcycle to the ultimate cleaning experience at Bajaj Bhaktapur. Our professional cleaning services will not only restore its shine but also protect its finish for long-lasting beauty and performance. Whether you ride for pleasure or commute daily, a clean bike is a reflection of your pride and passion for riding.\r\n\r\nVisit us at Bajaj Bhaktapur or contact us to schedule your professional cleaning appointment. Let us help you maintain the beauty and integrity of your Bajaj motorcycle with our expert cleaning services.', 0),
(7, 'bajaj-bike-wheels-1000x1000.jpg', 'Wheel Services', 'Keep Your Bajaj Motorcycle Rolling Smoothly with Expert Wheel Services at Bajaj Bhaktapur\r\n\r\nYour motorcycle\'s wheels are its connection to the road, so it\'s crucial to ensure they are in top condition for a safe and enjoyable ride. At Bajaj Bhaktapur, we offer comprehensive wheel services to keep your Bajaj motorcycle rolling smoothly and reliably mile after mile.\r\n\r\nWhy Choose Bajaj Bhaktapur for Wheel Services?\r\n\r\nSpecialized Expertise: Our technicians are highly trained in wheel maintenance and repair techniques specific to Bajaj motorcycles. They have the expertise and knowledge to diagnose and address any wheel-related issues efficiently and effectively.\r\n\r\nQuality Parts: We use only genuine Bajaj wheel components and accessories to ensure the highest quality and compatibility with your motorcycle. From tires and tubes to rims and spokes, you can trust that your bike is equipped with the best.\r\n\r\nState-of-the-Art Equipment: Our service center is equipped with state-of-the-art wheel balancing and alignment machines to ensure precision and accuracy in every service. We adhere to the highest standards of quality and performance in all our wheel-related services.\r\n\r\nComprehensive Services: Whether you need a simple tire change, wheel balancing, or more extensive repairs, we offer a full range of wheel services to meet your needs. From routine maintenance to emergency repairs, we\'ve got you covered.\r\n\r\nOur Wheel Services Include:\r\n\r\nTire Inspection and Replacement: Check tire condition, tread depth, and inflation pressure. Replace worn or damaged tires with genuine Bajaj replacements for optimal performance and safety.\r\nWheel Balancing: Ensure even weight distribution across the wheel assembly to prevent vibrations and improve stability at high speeds.\r\nWheel Alignment: Adjust wheel alignment to manufacturer specifications for optimal handling and tire wear.\r\nSpoke Tightening and Replacement: Inspect spoke tension and replace damaged or broken spokes to maintain wheel integrity and strength.\r\nTube Replacement: Replace inner tubes as needed to prevent air leaks and maintain tire pressure.\r\nExperience Reliable Wheel Services at Bajaj Bhaktapur\r\n\r\nDon\'t let wheel issues compromise your riding experience. Trust the experts at Bajaj Bhaktapur to provide reliable wheel services and keep your Bajaj motorcycle rolling smoothly and safely. With our commitment to quality and customer satisfaction, you can ride with confidence knowing your wheels are in good hands.\r\n\r\nVisit us at Bajaj Bhaktapur or contact us to schedule your wheel service appointment. Let us help you maintain the performance and safety of your Bajaj motorcycle with our expert wheel services.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(12) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=active,1=disable',
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `instagram`, `status`, `twitter`, `youtube`) VALUES
(13, 'https://www.facebook.com/hhbajaj/', 'https://www.instagram.com/bajaj_auto_ltd/?hl=en', 0, 'https://x.com/_bajaj_auto_ltd?lang=en', 'https://www.youtube.com/channel/UCyjsBkQ3rWlARQb9_UWqM5Q');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `included_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `title`, `description`, `included_at`) VALUES
(1, 'Terms of Service', 'Welcome to Bajaj Bhaktapur\r\n\r\nThese Terms of Service govern your use of the Bajaj Bhaktapur website and services provided by Bajaj Bhaktapur. By accessing or using our Services, you agree to comply with and be bound by these Terms. If you disagree with these Terms, please do not use our Services.\r\n\r\n1. Use of Services\r\n\r\na. Eligibility:\r\nYou must be at least 18 years old to use our Services. Using our Services, you represent and warrant that you are at least 18. Our Services are designed for adult users who can legally enter into binding contracts. If you are under 18, please do not use our Services.\r\n\r\nb. Prohibited Conduct:\r\nYou agree not to engage in any activity that disrupts or interferes with our Services, including but not limited to hacking, spamming, or violating any applicable laws or regulations. We strive to maintain a safe and respectful environment for all users, and any conduct that undermines this goal is strictly prohibited.\r\n\r\n2. Product and Service Information\r\n\r\na. Accuracy:\r\nWe strive to ensure that the information on our website is accurate and up-to-date. However, we do not warrant that product descriptions, pricing, or other content on our website is error-free. Despite our best efforts, some inaccuracies may occasionally occur, and we reserve the right to correct any errors or omissions.\r\n\r\nb. Availability:\r\nAll products and services are subject to availability. We reserve the right to discontinue any product or service without notice. While we aim to keep our inventory up-to-date, certain popular items may sell out quickly, and we appreciate your understanding in such cases.\r\n\r\n3. Orders and Payments\r\n\r\na. Order Placement:\r\nYou can browse and select your desired bike on our website. To complete the order, please visit our physical store where payment methods and other formalities will be handled. This process ensures you receive personalized service and the opportunity to finalize your purchase confidently.\r\n\r\nb. Pricing:\r\nPrices for our products and services are subject to change without notice. We are not responsible for typographical errors or inaccuracies in pricing. Our pricing reflects the quality and innovation of Bajaj motorcycles, and we strive to offer competitive and fair prices.\r\n\r\n4. Warranty and Returns\r\n\r\na. Warranty:\r\nOur products come with a manufacturer’s warranty. Please refer to the specific product warranty information for details. The warranty covers defects in materials and workmanship, ensuring you receive a high-quality product that performs as expected.\r\n\r\nb. Returns:\r\nWe accept returns of products under our Return Policy, which is available on our website. Products must be returned in their original condition and packaging. Our Return Policy aims to provide a hassle-free experience if you need to return or exchange a product.\r\n\r\n5. Limitation of Liability\r\n\r\na. No Liability for Damages:\r\nTo the fullest extent permitted by law, Bajaj Bhaktapur shall not be liable for any direct, indirect, incidental, special, or consequential damages resulting from your use of our Services. This includes but is not limited to damages for loss of profits, data, or other intangible losses.\r\n\r\nb. Indemnification:\r\nYou agree to indemnify and hold Bajaj Bhaktapur harmless from any claims, damages, losses, or expenses arising from your use of our Services or your violation of these Terms. Your responsibility includes legal fees and costs incurred in defending against such claims.\r\n\r\n6. Intellectual Property\r\n\r\na. Ownership:\r\nAll content on our website, including text, graphics, logos, and images, is the property of Bajaj Bhaktapur or its licensors and is protected by intellectual property laws. Unauthorized use of any content may violate copyright, trademark, and other laws.\r\n\r\nb. Use:\r\nYou may not use, reproduce, distribute, or create derivative works from any content on our website without our express written permission. This protects our creative efforts and ensures that all users respect the intellectual property rights of Bajaj Bhaktapur.\r\n\r\n7. Privacy\r\n\r\na. Data Collection:\r\nWe collect and use personal information under our Privacy Policy, which is available on our website. This includes information you provide when making purchases, contacting us, or using our Services. We are committed to protecting your privacy and ensuring your data is secure.\r\n\r\nb. Consent:\r\nBy using our Services, you consent to our collection and use of personal information as described in our Privacy Policy. Your trust is important to us, and we are dedicated to maintaining the confidentiality and security of your personal information.\r\n\r\n8. Changes to Terms\r\n\r\nWe reserve the right to modify these Terms at any time. Any changes will be effective immediately upon posting on our website. Your continued use of our Services after the posting of changes constitutes your acceptance of such changes. We encourage you to review our Terms regularly to stay informed about any updates.\r\n\r\n9. Governing Law\r\n\r\nThese Terms shall be governed by and construed in accordance with the laws of Nepal, without regard to its conflict of law principles. Any disputes arising from or related to these Terms or your use of our Services shall be subject to the exclusive jurisdiction of the courts of Nepal.\r\n\r\n10. Contact Us\r\n\r\nIf you have any questions or concerns about these Terms, please contact us at:\r\n\r\nBajaj Bhaktapur\r\nSuryabinayak ,Bhaktapur\r\n986514388\r\nbajaj23bhaktapur@gmail.com\r\n\r\nWe are committed to providing you with the best possible service and support. Your feedback is valuable to us, and we welcome your inquiries and comments.\r\n\r\nConclusion\r\n\r\nBy using our Services, you acknowledge that you have read, understood, and agree to be bound by these Terms. Thank you for choosing Bajaj Bhaktapur, the most trusted and useful site for bikers in Nepal. We look forward to serving you and helping you enjoy the best riding experience possible.', '2024-06-01'),
(3, 'Privacy Policy', 'Introduction\r\n\r\nBajaj Bhaktapur  is committed to protecting the privacy and security of your personal information. This Privacy Policy outlines how we collect, use, disclose, and protect the information we collect from you when you use our website or services.\r\n\r\nInformation We Collect\r\n\r\nWe may collect personal information from you when you use our website or interact with us, including but not limited to:\r\n\r\nContact Information: such as your name, email address, phone number, and mailing address.\r\nAccount Information: if you create an account with us, we may collect your username, password, and other account details.\r\nPayment Information: if you make a purchase, we may collect your payment details, such as credit card information or other payment methods.\r\nCommunication: if you contact us, we may keep a record of your communication for customer support and training purposes.\r\nUsage Information: we may collect information about how you interact with our website, such as your browsing history, pages visited, and preferences.\r\nHow We Use Your Information\r\n\r\nWe may use the information we collect from you for the following purposes:\r\n\r\nTo provide and improve our products and services.\r\nTo process transactions and fulfill orders.\r\nTo communicate with you about your account, purchases, or inquiries.\r\nTo personalize your experience and provide you with relevant content and offers.\r\nTo analyze trends and understand how users interact with our website.\r\nTo comply with legal obligations and protect our rights and interests.\r\nDisclosure of Information\r\n\r\nWe may disclose your personal information to third parties in the following circumstances:\r\n\r\nWith your consent: we may share your information with third parties if you give us consent to do so.\r\nService Providers: we may share your information with trusted service providers who assist us in operating our website, conducting business, or servicing you.\r\nLegal Requirements: we may disclose your information if required by law or in response to lawful requests from government authorities or law enforcement agencies.\r\nBusiness Transfers: in the event of a merger, acquisition, or sale of assets, your information may be transferred to a third party as part of the transaction.\r\nData Security\r\n\r\nWe take reasonable measures to protect the security of your personal information and prevent unauthorized access, use, or disclosure. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.\r\n\r\nYour Choices\r\n\r\nYou have the right to access, update, or delete your personal information. You may also opt-out of receiving marketing communications from us by following the instructions provided in the communication or contacting us directly.\r\n\r\nChanges to This Policy\r\n\r\nWe reserve the right to update or modify this Privacy Policy at any time. Any changes will be effective immediately upon posting on our website. We encourage you to review this Privacy Policy periodically for changes.\r\n\r\nContact Us\r\n\r\nIf you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:\r\n\r\nBajaj Bhaktapur\r\n986514388\r\nbajaj23bhaktapur@gmail.com\r\nwww.bajaj23bhaktapur.com', '2024-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `firstname` varchar(121) NOT NULL,
  `lastname` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `phonenumber` int(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `phonenumber`, `password`, `register_at`) VALUES
(1, 'rabin', 'lama', 'lama@rabin.com', 'lamarabin', 2147483647, '$2y$10$r7sqn.Prkdl9H5uovIgKGOmWojRmhwqvTTNSIxsK/xjrF3unEYxrK', '2024-05-10 13:16:31'),
(2, 'Suman', 'lama', 'lama@suman.com', 'lamasuman', 985667574, '$2y$10$Un3SXPUyTzc.R/AJHpvsiOuviXwFeyKpD70Zqhr.A.a/eEqFA5Fai', '2024-05-19 13:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(121) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
