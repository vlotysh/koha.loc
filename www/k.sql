-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2012 at 03:30 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(240) NOT NULL,
  `date_published` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `content`, `date_published`) VALUES
(27, 10, 'hHHGKKK<br>\nddddddddd', 1329665446),
(28, 10, 'rgrgrgrGGGGGGGGGFFFfggdFF', 1329660779),
(29, 10, 'ddddGGGGGGGGG', 1329660800),
(32, 10, '<b>Новое сообщение</b>.', 1329660877),
(33, 10, '', 1329660901),
(35, 10, 'cff', 1329661912),
(36, 11, '123sssаааа!!!!', 1330868196),
(37, 11, 'xcc', 1329678536),
(38, 11, 'ddfdef', 1329678552),
(39, 11, 'трололо', 1329761477),
(40, 11, '', 1330867242),
(41, 11, '', 1330868184),
(42, 11, '112233', 1330886984),
(43, 12, '123', 1331467156),
(44, 13, '123', 1332015352);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(240) NOT NULL,
  `title` varchar(240) NOT NULL,
  `description` varchar(240) DEFAULT NULL,
  `content` text NOT NULL,
  `language` varchar(2) NOT NULL,
  `date_change` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `title`, `description`, `content`, `language`, `date_change`) VALUES
(8, 'why_site', 'Why', 'Why', '<h2>Why</h2><p>Why.</p><p>Why.</p>', 'en', 1292937495),
(9, 'why_site', 'Навищо?', 'Навищо?', '<h2>Навищо?</h2><p>Навищо?</p><p>Навищо?</p>', 'ua', 1292937495),
(7, 'why_site', 'Зачем?', 'Зачем?', '<h2>Зачем</h2><p>Зачем</p><p>Зачем</p>\n<p style="text-align:justify">\nКонечно, в команде у вас могут быть те, кто быстро соображает, хорошо говорит и обладает перфекционистскими взглядами. Однако если только эти люди не предоставляют конечные товары и поставляют их непосредственно потребителю – или делают именно то, чему учат других, – тогда вам придется все начинать сначала. Всегда руководствуйтесь результатом и выбирайте тех, кто его достигнет.<br/>\nВы не идете в бой с той армией, которой вам бы хотелось, вы идете с той, которая есть. Но если сделать все верно, вы поймете, что обе этих команды – на самом деле одна, несмотря на возможный недостаток ресурсов.</br>\nИллюстрации: Everett Collection, shutterstock. Оригинал статьи тут. Перевод компании GreenfieldProject.\n</p>', 'ru', 1331492833),
(6, 'contact', 'Контакти', 'Контакти', '<h2>Контакти</h2><p>Контакти.</p><p>Контакти.</p>', 'ua', 1292937495),
(5, 'contact', 'Contacts', 'Contacts', '<h2>Contacts</h2><p>Contacts.</p><p>Contacts.</p>', 'en', 1292937495),
(1, 'about', 'О сайте', 'О сайте', '<h2>О сайте</h2><p>О сайте.</p><p>О сайте.</p>\r\n<div class="hero-unit">\r\n        <h1>Привет,мир!</h1>\r\n        <p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\r\n        <p><a class="btn primary large">Больше »</a></p>\r\n      </div>', 'ru', 1332015256),
(2, 'about', 'About Site', 'About Site', '<h2>About site</h2><p>About site.</p><p>About site.</p>\n<div class="hero-unit">\n        <h1>Hello, world!</h1>\n        <p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\n        <p><a class="btn primary large">Learn more »</a></p>\n      </div>', 'en', 1332015209),
(3, 'about', 'О сайті', 'О сайті', '<h2>О сайті</h2><p>О сайті.</p><p>О сайті.</p>\r\n<div class="hero-unit">\r\n        <h1>Привіт, мир!</h1>\r\n        <p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\r\n        <p><a class="btn primary large">Learn more »</a></p>\r\n      </div>', 'ua', 1332015284),
(4, 'contact', 'Контакты', 'Контакты', '<h2>Контакты</h2><p>Контакты</p><p>Контакты.</p>', 'ru', 1292937495);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'participant', 'Participants');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(13, 1),
(14, 1),
(14, 2),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `last_active`, `contents`) VALUES
('4f47ffe5c56ee2-92062239', 1330118665, 'K50tXtjE4zq6vsErlnFP2ZjTK3uSwUIQlUOne1+sq911UGhM7s/6cStPX2oWAyaQdSOpCFVbSw9kkLD/XvYUawntUCL1FSLChNNippW09XE='),
('4f454ce6643b87-32284164', 1329942580, 'G4UzzfoaOCLmt3wEJsYJmv/gJRTozSUE2SLR5ApagXKVoAjbi95yrwuzlNz0gkPiySa8cNp6CQ4NtCr0s5KeXeW4Ly3RycyMD8Jz6QvHBU8HWcUk4ShRzq4eZVWU'),
('4f43e8a05038c9-23102345', 1329855647, '6Ki41owsCcELyOfKreZfGKf7aCT6erd+j0ikZweL945ZP1RSwT5rZSZ1VQkaLaoqf6WWnqo5x8l6jBixxf6w/Pj1ZQUSgA5mnajlksQkd38='),
('4f40246403f1e1-08613644', 1329604282, '6KL8x40eahy+7Eq3pdeDI7YLqXNigU0MexooGfz5ec202PpwgfwO2JjFfgZKCa3G8ntVqJf0lE5mNKfwVlHafJ1gcpDT/X9B2C9bJ9iCwTNZzU4+fYZRQW9dSzBmQlJFqqKAttk='),
('4f414aa3056fc4-08339212', 1329679403, 'dSclAuvoUFQO1FpUI1JMKX8OEjGfAFDCOb2aTkPQJrgJ1IhpkiuH5jSn4yPgWymQK3Hcc+nCi8y6awYtZiAOe2NFm/rp/01lSBEh+Bc++wHWaoDMMA=='),
('4f4165554e9bb1-81529765', 1329686937, 'Fd16OnSNJ3HulqIGzWD0IIZRmr3XWoF1JqK6VUhMMqZ8Yn0QJo3OyBHCoLNRyI6wWasng3MWDN34253td8P/r75HqkHtnFbRb3hLSA7W9jWZwTDHfVwWiEM/UfGxPG/5wGNS4qxF/3XjJvFL7wSCOCFAVApyKKv4ja8G97TdKPSb5GUoX6e2mAeiGNEWaLHULf0KO/fvIMDzZuQIuRUoXkv19zucfIa/Ild5e4mbTSnAGDm3ZqwePpahUAPJ2vL8f9opUCmtzbRe9KSb74a9JrvpuP49rx/Ffencwa6ZRyx5p24I5mqT31YGgQ5l3rX3+s22RsibpFQ0GesDBclWwNYSAe3qVRppFvPmxByZHJ9NGzUsmbJgnF1RIuGBdQGwj6QaMnT/DvmToifbQ35PrlPJm62PAfQwc8JZnKQZCT3zQFjQoybcTNFod9tswErT0YnQyXAcHCBN9BcOnVNgt9JC9RjO2ucH61z7QiK4Jh8coTtR6ggrmIGNu1XsyMQ7Crp/Bm0DRp6O+KDdD1IwIKS8VVBJLeNVbAsAI6RFwpgWG4FdqO22Vnqd/vkomUQ9Ras0lsQ//Nr3mByjoR0Y5e+Mv+MrkmyA6Co+46Xk/7Y+uSfYEpqI4hlRsgl7JFR0IH1PCJ8EVlUt2Cb7eojOE+iPiw4TIKRkkqOAjenFqhdvSmneSy2inIkayDE7BA/wxUPgrF4jRYUPUr1QBMm21PzQQMmw4P1elESbeXe0FBNsUU/bWXCgSkDPBI7mQd/5/u71kM/Mnah0QS3y2dg/kVR/x/RATOBaaaz1uUEtm+SOZVqDZnModi7PY+nwpfuDBU9hmDFcX8ZtBb6ctS3btLhCmueJUeMgh1DjK8qsDbJsPxxqkqOmPWtd0mzQ+vVD7cfPP+ksD6B4zW7ahpBqc0CSBilnZYWhrinjJMYBuBHDvXEO8FIlzYKMk76DX5JYyICVqRh0DbhXrkMJtBYh8ySHpprRLCalgFM3YoynMKT4xeB+JnUpiqM21BRuEtTrCUGqBqQNEn/QaTF7Jw=='),
('4f493a7e026a20-68814379', 1330200045, '7PJ6ZG9x0BPcWUeufhPlXwG8Y6imVZgHGTkJhkvR0KMEfj44MjSqSYuAPtyU7yK1q1aXyXCgnOY8RYjLu4av4U7tAQE3bDwUTZtThBzAaqW3wCXb'),
('4f46a0102ad329-37120763', 1330028861, 'QBjUb9EVJx0gVZuCVKAaJ1NyuqgE6LLic5VCzRFw4ujlolAfJ9m2BZfoC+gYQReokzZVaYFDZcInEJrSSaOMbtsFEMjBM9ZA9dAMHaLoT9Mjk8kvTKMfGRDM87ya'),
('4f4a66fdbee379-16420665', 1330296178, 'LV7YxOM6ur7BK5ZxT9m3RsZqwZ19/68bPoJqlj/NX6t6LUfHNntbBY+0NU/pPxCC8oG2xg6PG4yVVwZmAbsTv1EO627SLBqELngbpz2LOr4='),
('4f4d561a86cd19-38118349', 1330468403, '5o/OLhil32W5OPN90nDTXzcItc3Ep+WOTZdIPAkZnnySC/fvHJIpEJdznf2Exr48uhd7rrRcE8Pml+awKPUU+sT7G5d5PpUSXUoOAIqVZrerqH1k9O4TSpqUFq3Zh+acG5NIhaYKv4QoV45lGGQWGGoR0o0aGDzKpDXuvf3VlOHXOdNV1slfQgBjB/ib8lsv1zr9UGKsbXnY0LsZnJHxAiC10vvjwdsdFm/glg1jfqs39TS59QQcwGFh/RBo9LejrFBuv2dCgmqrrqmlkMM7bVwC1NUvmZOBE0bQbAkK4mHn1nfeqp35iKgwjQu0VtcbPi/KOqdc1AoIq7+RQn2PnPHIxUa5j2TjH0ROiSAgw5R1j2ePD//owKUNn2sQTnwOeWQjSpMqRoSNkUj/June0nrHPUMKiIzT9B9lYCcbCTn6cffMKSaC+igQHial83aEv05qEttv3OH5bFt0v/MFNizSK7IqXjjYjiycfWKTS/nZUVxudMRpcXQ0EY4lC+NLhQzt9XTnhVF1uv+ntTVL+iG8OMWoxdiD6F1Tv8KSgigiZ/mwF4DT5vFFcu9TiV1doubngVjKSpkwRbwRi8UD2bvB/v122Hl4hbnPpw1QZnGaQKmJDCgbD7Ebk5ctRLU8b8kJkyTA/euPetJwoJTC8TAXZshXyOFMBhBq1OB2Q8uAGibUFmEFJFWlI87QbybchUMNw1HQGrpK0wj5v4f1iKoWXiIUxcwOVvkvtONMRtGvpK6yakizd+TkKdYoagobHKa7IwvxkoAc2P8TntOFj/kLNsiMGjTb++6nJiWfd9dHJde5yUCeAQ/LY4ftNv62ZZDZ0WcQXkv0h/TaXLFN84tpaSk9d/9+ma+BivXBCl99V61m6pVkAcXe80VfAs9aXKmqoziY3a7cn8HwaNaDZkHW6XAWlI0FiEdALnv+ZT1lwVlAwlQR8wKvPDPWrVoenFP+32MDGo3E/FVhCh+OWDMaveZYUhFzCaKMsoLUwnKE0r3iDVZyQ21htCnhm4SwH30bwitiQ8xziKxMmg=='),
('4f4eaf221bbc52-38749641', 1330556740, 'CxcgOD9E9drJdnemNFbsBDUTTxL5xjp51A8BGmXWPhRf0aY8oBZEpUSwQa+CX/1fsDf7PFe/bmTKdb0v5VDGoWWGRXGx646nZ9QKM5QlghE+OjBxuS7C'),
('4f53b92aa54d81-28650283', 1330886991, 'Z9onb8gPVEZrmYbHNwRmPQQYQeQritWNPIu86ub5/0fIP465doRu2B46QwqeyQ8ugaSATQnCDDvGfX2r76q4rdGgGRiKwn0DKxVT1pfwtkyNTLXLZDjemdm+SRSGnhj5GsnUcksi5lGwN0Ij9frOVZ+KcM73iG+JlDzqF80tPzpWd+N2Ugz2ELJ1OmSjRAV+aDoOz1QJ0AEd7BcyrHbnSiLKFOuMIjsLnKl/U5pEh8dwOROJb0mVAZy/lc1VlTFhAM1tvOHoJKeMdsFdEdJYJQpyTAQtEkLljSp1/TQ0TpnJc96/HURtl8JcK3RBzQaduWTTgQZQA5ufMwfhmxIf2hLoGaRriGXeJyRdk5FLuGFrskYZOmDOzacNOu61tS1jqiqeMN4qjqFq7H0fUyqYJj1cqjqkjyqUabJbg7cID47Kc3fHuvt5vIWcgiWjXXXs33s6w7rX+kZ+0SzzIEipc9bCqi39PPCGrrEtgac1KccM3e+5qeB5Go0Dnl/roUn73tLhGnBVIJ8AGINR/wqDG0BDG3PBirxwsbvF8LLY7/CrMtyVLp5wHU64OnYk1KBHHJWYrwTKCv0aLc13JvKowLAqzsbngv0i8mW1SwOTlHVLcO2Z1qx+mjUiKfi7ff+FFI6TIEfX2IIeVJGCFFVaOKOUEBUIrUZCIYB9vANrNRImdOyCsTxDDfMwCn18+bPYDML7X7773D1UDvh86Cv08kLp04mdd6v2/Biw/EONNnijxw5/lxWmvQ1olQiqrxhABfVWDCZBP4GgQYI8tUecLv5yCATL8sPV/ncdYIPxgdD2qg8oL1jBE1zsGdVSP6yHJGyX0awbFusAIJQp5Pd3fxU1T9FLQcH+ueKGUVfAcSkrxDfUZmM5HMs8fJEneIvcVoRpF3dIdI6AYmSZnr5lNk34q9+pRGw8dHx6wQcUGE0GmpHneV7+eWtMd1WdpTaHUcjgZEfisrxwzRipb8eIkEO+docDuaw3YlPil9a6IKD5IunQGsGxyqJ8DXAys4Nwc+gufO0VgPmUa3okfoy3'),
('4f56688857d790-61900767', 1331066380, 'VXBjM2yQfambdwMKaso9uqXJ7NR3EXIdn9o2hBaI857xXo9Cxm8JL4/jq/BR5HLmQRxfoqYIGxJaEbDll0lk6NW1NA99BdNAMOriXz13PoSGv4zOGyY6JIKYdD5h'),
('4f5b525cb649a5-19633755', 1331385073, '9drJdnemNFbsBIYLHtpIPruiE0DC/VT8YxsKh18LIGMWrlZXsZXfkTRbjryJurJoh+LshKH/EGPZgW3DiVjJMcvy/aVXbEkpBKapGAiJIU9hYzrnUYDLdx+4t2LYq5PrwsBa1qV/aF5j2MqqObUfl/r2befe4Vv36hUMcXFSL+kaWAFFpHwz5SIyFknJ8Qj8uQBcEsDBN9uh9I247P88RM+0B2tv1oG0I+XCGKfa+GAi6C2sghHAEC6E8V7NpvPl7rTKkrwFhayMMfoGMYeL5GRNkxKF4dVrQThZoDLkr6ECj9aoRxTDP0taVHkwLCdGWOuCsV1DEm5nsPgRbPXRVkd+FkZCiFqgnBpFT9NrU/eNUebHhq4bo980lv5pDsoWWbVY+9JvRDRKRTYy9QOelv4T0obis+UhvkU1Yk/mfuTYlNkXNiBp8WaDOi5O9IqbW46U25z9cl4W6kaTcahoZ5ZSwmIqT41GDtovdnmA+m0nXVRLsUcrH1xJGaJlgaKM/cxadqoueGUeSUnueaVbKUGVygXpdbJOIVChOHcHJ6T2RfKzkt2pC9IZOi81uoUn7IdHMoboQe43SYyMgrmut9fjYvP6HCQ7Vyo5zowljKgyhq+yh2lnjsBleAor3Eqfm+vwPxa4mRVCp/GPaCuqWIJTZ8hhpHb+1czxx1pMKoKELZDpiWOpcVHji2s3RAkoTtRH2D0Vum4/Zy2y43x5aUuCb8yzwItB4xlNGAzLJNIjvGiOnA4QxOiUmTIgmj2D0GzuLOAHwhCXzn4G9eow0GznFShf+VIfsz74MlCQsmXEB2fDd/6fumK9VR5tMOARJZCYOR3pZ6jydFgnMWvU5YAOBqrSexeQoADBcEmuyYpsDhN5R0zmI1fT5TJkvvtEum5EKr13PVXVjkTImULhrgNYD95dkPwIrdVobbjqczfvegOQ1V0KI2E6Vs+05We2RTg2WJ2HfoqsZafgF83GD/djypms7LmXRwqGr5UDr79fKsMTNUUJf1m7JhohEO15fuHnsW9czGB89nVAuZNtnSswuU63534v'),
('4f5baa9f2d30d2-21986176', 1331407519, 'dMcHdPnhpC146z9pWez+8DiYNVGw3LtMzWo+IJm4jhA+cD4wDgLHhNrzbYoMUHIoojNZiQbVjMLXed2uFuUDYljjXcN0oggK8ATttdRnbTcDmLiJlBMvAFmnZLNM'),
('4f5bc65a1cd168-88705197', 1331467162, '1SYs44I2HVR6kI6SBpuGxQ0qeDsnHF4RUiyZqa2xsoxk8bcMx/nDr1xi578KiaxMoEFLyj7ehi9a/9/a9btNRKyVX2OE6y5Zt909Yxwk3NJA/aFAcz39qWPNnmyFsCei4ea0TZy8FG6xzBYTA45gzRhax8CH130J76VcHXw20CguS0bexYhF64acQK5LEWTlODHO0iAFrSmWqS0c1xK9g1HFybxZ2JR00HrA2PUWpzWUfAngq+EIynIjwvtnJ+sv4atA3OEdAmUbjyxgwSWutUt7DvPQnVdwLaDhII8R1AW87kRGE8OpXIRTWJibeIvwbs/jjzJ8lO5TsO9pCFF9uYW5iaNua/IBcY1aFB12SLYvAeIVrNVw7b9nkZ8TnBaNyrg9m5PJiBoAuHFojU9xHwBvnN+NpugpIpMqyen/6cCOhpDXlY8xFJ6R4VTvh3x8LputYzZUKOK0E4lnD3Hj+xsUfmD3+EenITb3TI777Fbm5Q0bScR3GvMPs+SoeQfdP6aeYjrzPLc2ff5fP/jwYtPwS7Wx3l/J8eDZ2zjgjV9cpYgnzhYp12hiaGwq4McJp6FzPRfKkJMVcXjnNPL+yu8OkQr/Ij2u9y5bjMmbHJodEhkuQfeLJhNTlKCV/u/vWiPAprWsHTVm068UDyibGK+iWHtdE7KfyXVHgNh8RcuBsrD5hvPxyoyJLqNFVSYcVl48EMZFBlgzRGhLY1p+AttMQaec0ApIiqMzOh5EZ9XStdtKk2/aD9Ocizj/Jl/jEr7tbM7ZWvHDGG9WF6fzsoLW100r4LvThQF9Q4QsAY+Q+Ws8GFyt/D8nHIg7Dsj8qqEA68Ra6XwUdYwTehqRvfX6YEN41HBbmWzbC/wF+eACwaVC63o0KltfqXO/hgAOIlePafSie2wgtC/N3bu6oIjv/1swkBuvdQd/SHGlWON5EIhdl1BXqjZ9zSW4RDhvxzk9ktX4pcSddqeKMqK2B6iwxsyG7BuZMlKmGxmZsk6army3Z+AcQF8bLXSICg3viu5FlRPCmm2EpQIqcGFLGX2yOJTx7Tga+w4frqytM1NYnA6Iqg=='),
('4f5d0aac6095f4-49705844', 1331497659, '8/O6/Te2UguM4D9U2/oqICo7QeFblz4a1gMNu0bjpoyxlCGXYp3M368vcoCFvUbzP0T3EvLhThGP9SOT0y8PRcGD3XzZhTq3dUz0+jZhasHs5CEDFbvqaGvVLBee'),
('4f64f133245563-11716407', 1332073628, '/gBFT2PPtzAXfA5TIi4QnhyCk/uWx8Ba8Zt9iebjlSiC1MUYOTR9426ED6SfpagnLlnS8v4cdBUObLtJljc2zRSombAc8WiC0HyZcJ7Bz2T39OS34JKJ'),
('4f65c9d02d6f35-79768650', 1332070893, '6bd3bp4Wul+hU+CS/JWy7VtpKNTuyyOApxVfdXce6XbN4VwU7gCRKCm2diEuB7SSEOECwcxGLkEvPSZgkxCtjsujWEL7O/YcoBFvhzMcBa5j99WDROn4l/yLhWAz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `reset_token` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `reset_token`) VALUES
(13, 'user@user.ru', 'user', '3f884a8dcd987e71494a1390f9b0a51306944707ede59dddd003428628c64cf6', 2, 1332015319, NULL),
(14, 'admin@ya.ru', 'admin', 'f4b4ad84a019c58c380e9ac1a9ab12c4bd4171363b8c6822b8f2c5f2ff699230', 2, 1332015152, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_tokens`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
