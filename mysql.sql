-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2016 at 01:55 PM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoshibu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE IF NOT EXISTS `app` (
  `app_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `date`, `image`) VALUES
(1, 'Inconcievable', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris metus elit, commodo sit amet consequat faucibus, vulputate in purus. Phasellus ut nibh diam. Donec vel turpis sit amet massa ullamcorper hendrerit. Aliquam semper sagittis mattis. Etiam mollis massa id egestas auctor. Etiam pulvinar suscipit ligula finibus ornare. Donec iaculis urna augue, at tempor eros ullamcorper sit amet. Praesent dignissim laoreet tristique. Mauris et lacus sagittis, hendrerit orci ac, tincidunt nunc.&lt;/p&gt;\r\n\r\n&lt;p&gt;Fusce in ante vitae justo commodo posuere iaculis nec sem. Cras lacinia velit non tellus placerat fringilla. Aenean rhoncus, lorem sit amet pharetra varius, est libero imperdiet dolor, a lacinia diam tellus a justo. Maecenas consectetur eros vitae urna luctus, ut iaculis eros fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus iaculis orci, sed tincidunt erat dictum ut. Donec porttitor mi nunc, non suscipit odio eleifend at. Aliquam lobortis neque a lacinia aliquet. Nam elementum est a eros convallis ullamcorper. Donec luctus tempor ex quis commodo.&lt;/p&gt;\r\n\r\n&lt;p&gt;Cras dapibus, quam sed luctus pretium, sapien lorem commodo lectus, at mollis augue diam vitae ante. Aliquam ultrices at dui eget placerat. Duis eget tellus neque. Curabitur vel dui magna. Suspendisse facilisis felis at convallis vulputate. Donec vestibulum gravida porta. Mauris tempor ut magna sed malesuada. Donec varius purus ac leo sagittis, et convallis orci consectetur. Vivamus vitae massa augue. Fusce rhoncus diam id finibus fermentum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Fusce maximus in sapien non egestas. Etiam condimentum tellus vel dignissim dictum. Sed rutrum varius facilisis. Sed in turpis urna. Nunc accumsan metus nibh, ac dapibus erat dignissim in. Duis sit amet ligula sed augue fringilla congue. Duis interdum urna eget facilisis interdum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Mauris sit amet cursus tortor, eu efficitur erat. Suspendisse gravida lorem vel tincidunt lobortis. Nulla et pretium eros. Nullam lacus risus, aliquam tempus odio a, imperdiet vulputate diam. Nam viverra maximus fringilla. Quisque egestas urna et lacus faucibus, ut porttitor ex blandit. Curabitur gravida luctus ex in tempus.&lt;/p&gt;\r\n', '2015-12-30', 'Randazzo-lr_1451682903.jpg'),
(5, 'Commerical ', '&lt;p&gt;This is one of our commercial spaces for a car dealership.&lt;/p&gt;\r\n', '2016-01-01', 'PJcarinterior-lr_1451682849.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_order` int(11) NOT NULL,
  `cat_thumb` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `_cat_id` int(11) NOT NULL DEFAULT '0',
  `_email` varchar(255) NOT NULL,
  `_password` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `_parent` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_order`, `cat_thumb`, `featured`, `location`, `_cat_id`, `_email`, `_password`, `modified`, `_parent`) VALUES
(1, 'Slider', 0, '', 0, 'slider', 0, '', '', '0000-00-00 00:00:00', 0),
(8, 'Rabbits', 1, '', 0, '', 0, '', '', '0000-00-00 00:00:00', 0),
(9, 'Dogs', 3, '', 0, '', 0, '', '', '0000-00-00 00:00:00', 0),
(10, 'Cats', 2, '', 0, '', 0, '', '', '0000-00-00 00:00:00', 0),
(11, 'Collage', 2, 'moonflower2-thumb_1453928486.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 9),
(12, 'Painting', 4, 'AS_437_brightened-thumb_1453928464.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 9),
(13, 'Sculpture', 5, 'PD-Banners-Sculpture_1454019281.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 9),
(14, 'Surfboards', 3, '4-thumb_1453928519.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 9),
(15, 'Tables', 10, 'PD-Banners-Tables_1454018841.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 8),
(17, 'Chanel', 9, '_GJM9095-thumb_1453928634.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 8),
(18, 'Installation', 8, 'PD-Banners-Installation_1454018876.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 8),
(19, 'Exhibition', 13, '', 0, '', 0, '', '', '0000-00-00 00:00:00', 10),
(30, 'Design In Progress', 11, 'Category-Art-InProgresscopy_1455657995.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 8),
(26, 'Test Gallery', 0, '', 0, 'gallery', 0, '', '', '0000-00-00 00:00:00', 0),
(29, 'Art In Progress', 6, 'Category-Design-InProgress_1455658100.jpg', 0, '', 0, '', '', '0000-00-00 00:00:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `forgotten`
--

CREATE TABLE IF NOT EXISTS `forgotten` (
  `forgotten_id` bigint(20) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `forgotten_key` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `g_id` int(11) NOT NULL,
  `g_image` varchar(255) NOT NULL,
  `g_order` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `_parent` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_image`, `g_order`, `cat_id`, `_parent`, `caption`) VALUES
(144, '_1458051481.jpg', 4, 8, 0, ''),
(145, '3_cute2_1458051481.jpg', 0, 8, 144, ''),
(143, 'Baby_Bunny_1458051467.jpg', 0, 8, 142, ''),
(142, '_1458051467.jpg', 1, 8, 0, ''),
(146, '_1458051501.jpg', 3, 8, 0, ''),
(147, 'Bunnies-bunny-rabbits-16437969-1280-800_1458051501.jpg', 0, 8, 146, ''),
(148, '_1458051509.jpg', 2, 8, 0, ''),
(149, 'Bunnies-bunny-rabbits-16438007-1280-800_1458051509.jpg', 0, 8, 148, ''),
(153, 'AdobeStock_53651602.jpeg_1458051724.peg', 0, 10, 152, ''),
(152, '245258-cats-cute-white-cat_1458051724.jpg', 4, 10, 0, ''),
(154, 'AdobeStock_66164436.jpeg_1458051735.peg', 2, 10, 0, ''),
(155, 'AdobeStock_66718462.jpeg_1458051735.peg', 0, 10, 154, ''),
(156, 'AdobeStock_73046861.jpeg_1458051749.peg', 3, 10, 0, ''),
(157, 'AdobeStock_73449038.jpeg_1458051749.peg', 0, 10, 156, ''),
(158, 'AdobeStock_75721918.jpeg_1458051764.peg', 1, 10, 0, ''),
(159, 'AdobeStock_83403431.jpeg_1458051764.peg', 0, 10, 158, ''),
(160, '224832-dogs-cute-dog_1458052098.jpg', 2, 9, 0, ''),
(161, 'cute-dog-40_1458052098.jpg', 0, 9, 160, ''),
(162, 'Cute-Dog-dogs-33698322-1024-768_1458052104.jpg', 3, 9, 0, ''),
(163, 'Cute-Dogs-dogs-13882990-1600-1200_1458052104.jpg', 0, 9, 162, ''),
(164, 'Dogs_wallpapers_hd_Cute_1458052109.jpg', 4, 9, 0, ''),
(165, 'dogs-hd-wallpapers_1458052109.jpg', 0, 9, 164, ''),
(166, 'dogs-high-resolution-wallpaper-1_1458052114.jpg', 1, 9, 0, ''),
(167, 'GTY_yawning_dog_dm_130807__1__1458052114.jpg', 0, 9, 166, ''),
(168, 'phpThumb_generated_thumbnailjpg_1458580143.jpg', 0, 8, 0, ''),
(169, 'phpThumb_generated_thumbnailjpg_1458580143.jpg', 0, 8, 168, ''),
(170, '1500207_orig_1458580296.jpg', 0, 8, 0, ''),
(171, '1500207_orig_1458580296.jpg', 0, 8, 170, ''),
(172, 'Bunny-Suddenly-Remembers-There-Are-Fresh-Carrots-in-the-Crisper_1458580323.jpg', 0, 8, 0, ''),
(173, 'Bunny-Suddenly-Remembers-There-Are-Fresh-Carrots-in-the-Crisper_1458580323.jpg', 0, 8, 172, '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `images_id` int(11) NOT NULL,
  `placement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=393 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`images_id`, `placement`, `thumb`, `image`, `_order`) VALUES
(372, 'images-17', '', 'SB-About2_1468003246.jpg', 12),
(371, 'images-17', '', '5_2nd_Ave_EH_Y6A3205_1468002951.jpg', 20),
(370, 'images-17', '', '7U4A7923_1468002951.jpg', 8),
(369, 'images-17', '', '7U4A7976_1468002951.jpg', 10),
(367, 'images-17', '', '7U4A7991_1468002951.jpg', 9),
(356, 'images-17', '', '7U4A8089_1468002951.jpg', 1),
(357, 'images-17', '', 'IMG_0252_1468002951.jpg', 14),
(358, 'images-17', '', 'IMG_5824_1468002951.jpg', 15),
(359, 'images-17', '', 'IMG_0251_1468002951.jpg', 13),
(360, 'images-17', '', '7U4A8138_1468002951.jpg', 21),
(361, 'images-17', '', '7U4A8118_1468002951.jpg', 2),
(362, 'images-17', '', '7U4A8072_1468002951.jpg', 4),
(363, 'images-17', '', '7U4A8075_1468002951.jpg', 3),
(351, 'images-16', '', '5_2nd_Ave_EH_Y6A3015_1468002578.jpg', 6),
(368, 'images-17', '', '7U4A7968_1468002951.jpg', 11),
(339, 'images-16', '', 'IMG_0581_1468002578.jpg', 13),
(340, 'images-16', '', 'IMG_0584_1468002578.jpg', 17),
(341, 'images-16', '', 'IMG_0540_1468002578.jpg', 4),
(342, 'images-16', '', 'IMG_0549_1468002578.jpg', 3),
(343, 'images-16', '', 'IMG_0532_1468002578.jpg', 14),
(344, 'images-16', '', '5_2nd_Ave_EH_Y6A3197_1468002578.jpg', 10),
(345, 'images-16', '', '5_2nd_Ave_EH_Y6A3229_1468002578.jpg', 9),
(346, 'images-16', '', '5_2nd_Ave_EH_Y6A3080_1468002578.jpg', 1),
(347, 'images-16', '', '5_2nd_Ave_EH_Y6A3192_1468002578.jpg', 7),
(348, 'images-16', '', '5_2nd_Ave_EH_Y6A3033_1468002578.jpg', 2),
(349, 'images-16', '', '5_2nd_Ave_EH_Y6A3066_1468002578.jpg', 12),
(350, 'images-16', '', '5_2nd_Ave_EH_Y6A3023_1468002578.jpg', 5),
(366, 'images-17', '', '7U4A8058_1468002951.jpg', 5),
(364, 'images-17', '', '7U4A8063_1468002951.jpg', 6),
(365, 'images-17', '', '7U4A8048_1468002951.jpg', 7),
(354, 'images-17', '', '7U4A8145_1468002951.jpg', 18),
(355, 'images-17', '', '7U4A8149_1468002951.jpg', 19),
(352, 'images-17', '', '7U4A8121_1468002951.jpg', 16),
(353, 'images-17', '', '7U4A8142_1468002951.jpg', 17),
(336, 'images-16', '', 'IMG_5457_1468002578.jpg', 15),
(337, 'images-16', '', 'IMG_8174_1468002578.jpg', 8),
(338, 'images-16', '', 'IMG_5453_1468002578.jpg', 16),
(375, 'images-18', '', '7U4A8145_1468003676.jpg', 5),
(376, 'images-18', '', '7U4A8138_1468003676.jpg', 6),
(377, 'images-18', '', '7U4A8142_1468003676.jpg', 3),
(335, 'images-16', '', 'IMG_8614_1468002578.jpg', 11),
(373, 'images-18', '', '7U4A8149_1468003676.jpg', 2),
(378, 'images-18', '', '7U4A8127_1468003676.jpg', 4),
(379, 'images-18', '', '7U4A8132_1468003676.jpg', 7),
(380, 'images-18', '', '7U4A8121_1468003676.jpg', 1),
(381, 'images-18', '', '5_2nd_Ave_EH_Y6A3205_1468003676.jpg', 8),
(382, 'images-18', '', '5_2nd_Ave_EH_Y6A3229_1468003676.jpg', 17),
(383, 'images-18', '', '5_2nd_Ave_EH_Y6A3192_1468003676.jpg', 15),
(384, 'images-18', '', '5_2nd_Ave_EH_Y6A3197_1468003676.jpg', 16),
(385, 'images-18', '', '5_2nd_Ave_EH_Y6A3105_1468003676.jpg', 19),
(386, 'images-18', '', '5_2nd_Ave_EH_Y6A3146_1468003676.jpg', 18),
(387, 'images-18', '', '5_2nd_Ave_EH_Y6A3066_1468003676.jpg', 13),
(388, 'images-18', '', '5_2nd_Ave_EH_Y6A3080_1468003676.jpg', 9),
(389, 'images-18', '', '5_2nd_Ave_EH_Y6A3033_1468003676.jpg', 14),
(390, 'images-18', '', '5_2nd_Ave_EH_Y6A3052_1468003676.jpg', 10),
(391, 'images-18', '', '5_2nd_Ave_EH_Y6A3023_1468003676.jpg', 11),
(392, 'images-18', '', '5_2nd_Ave_EH_Y6A3025_1468003676.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` bigint(20) NOT NULL,
  `module_page` varchar(255) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_install` date NOT NULL,
  `module_desc` text NOT NULL,
  `can_be_removed` tinyint(4) NOT NULL DEFAULT '0',
  `module_order` int(11) NOT NULL,
  `module_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `content`) VALUES
(1, 'About', '<p><strong>Overview</strong><br />\r\nBorn | 1955&nbsp; New York City<br />\r\nLives and Works | East Hampton, NY</p>\r\n\r\n<p><strong>Education</strong><br />\r\n1988 | Master Workshop of Fine Arts, Southampton, New York<br />\r\n1979 | BFA, Tufts University, Medford, Massachusetts<br />\r\n1979 | Diploma, School of the Museum of Fine Arts, Boston, Massachusetts<br />\r\n1975 | Video Workshop with Nam June Paik, RIT, Rochester, NY<br />\r\n1974 | Franklin College, Lugano, Switzerland<br />\r\n1973 | School Year Abroad, Ecole Des Beaux Arts, Rennes, Fran</p>\r\n\r\n<p><strong>Biography</strong><br />\r\nPeter Dayton emerged on the art scene in the early 1990s and is best known for his flower collages and witty surfboard paintings. He uses the language of Pop art to reference commodity culture, appropriating images and stripping them of their meaning: &rdquo;I see them as color, shape, pattern,&rdquo; says Dayton. Commenting on their artifice and exploiting the way commercial images remove subjects from the realm of reality, Dayton&#39;s flowers act as a vessel for his exploration of style.</p>\r\n\r\n<p>For Dayton, careers in art and music have always overlapped. During his studies at the School of the Museum of Fine Arts in Boston he became the lead singer in the band La Peste. Deeply influenced by the punk rock scene, Dayton soon left for France, where he established his own New Wave band, landed a record deal, performed with the Cars, and became a lip-synch singer on French TV.</p>\r\n\r\n<p>Returning to the U.S. in 1989, Dayton returned to art-making, welcoming the more leisurely lifestyle of studio production. Reminiscing on his punk rock days, Dayton notes that &rdquo;We did cutout lettering, ransom-note style, like the Sex Pistols,&rdquo; referencing how his artistic background continued to influence his music. Indeed, much like his music, his floral collages are bright, bold, and loud.</p>\r\n\r\n<p><strong>Public and Corporate Collections</strong><br />\r\nChanel USA, New York, NY<br />\r\nChanel Ginza, Tokyo, Japan<br />\r\nMuseum of Fine Arts, Houston, TX<br />\r\nGreenpoint Bank, Brooklyn, NY<br />\r\nPhillip Morris &amp; Co., New York, NY<br />\r\nRNR Corporation, New York, NY<br />\r\nTeleflora, Los Angeles, CA<br />\r\nParrish Art Museum, Southampton, NY</p>\r\n\r\n<p><strong>Solo Exhibitions</strong><br />\r\n2014&nbsp;| Peter Dayton, Anarchy in My Head | Winston Wachter, New York, NY<br />\r\n2013 | Surf Shop | Neoteric Fine Art, Amagansett, NY<br />\r\n2012 | rocknrollshrink | fordProject, New York, NY<br />\r\n2011 | Surfboards by Clement Greenberg | Weber Fine Art, Greenwich, CT<br />\r\n2010 | Beginning of an Era | John McWhinnie @ Glenn Horowitz, East Hampton, NY<br />\r\n2008 | Black Boards White Chicks Part II | Salon 94 Freemans, New York, NY<br />\r\n2007 | Black Boards, White Chicks | John McWhinnie @ Glenn Horowitz, New York, NY<br />\r\n2006 | Surfboards by Clement Greenberg | Winston Wachter, New York, NY<br />\r\n2006 | P-111 | Salomon Contemporary, East Hampton, NY<br />\r\n2004 | New Work | The Baldwin Gallery, Aspen, CO<br />\r\n2004 | Pop Goes Nantucket | The Seven Seas, Nantucket, MA<br />\r\n2004 | Dear Mr. Grey | The Drawing Room, East Hampton, NY<br />\r\n2002 | Devin Borden | Hiram Butler Gallery, Houston, TX<br />\r\n2002 | Winston Wachter Mayer, NY<br />\r\n2002 | The Baldwin Gallery, Aspen, CO<br />\r\n2000 | Greetings From Pleasantville | Winston Wachter Mayer, New York, NY<br />\r\n2000 | New Work | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n1996 | Morris Healy Gallery, New York, NY<br />\r\n1995 | small paintings | Paul Morris Gallery , New York, NY</p>\r\n\r\n<p><strong>Selected Group Exhibitions</strong><br />\r\n2015 | X Contemporary | Miami Basel | Willoughby Advisory<br />\r\n2015 | She Sells Sea Shells By The Seashore | Eric Firestone Gallery, East Hampton, NY<br />\r\n2014 | One Way | Peter Marino, Bass Museum of Art, Miami, FL<br />\r\n2014 | Please Enter | Curated by Beth Rudin DeWoody | Franklin Parrasch Gallery , New York, NY<br />\r\n2014 | Project No. 8 at Grey East | Grey Area at Glenn Horowitz, East Hampton, NY<br />\r\n2012 | Open for the Stones | Harper&rsquo;s Books, East Hampton, NY<br />\r\n2012 | Sound Quality | Grey Area, New York<br />\r\n2012 | rocknrollshrink | Paul Kasmin Pop Up, Miami Basel<br />\r\n2011 | Nose Job | Eric Firestone, East Hampton, NY<br />\r\n2011 | rocknrollshrink | Local 87, East Hampton, NY<br />\r\n2011 | Local 87 | Local 87, East Hampton, NY<br />\r\n2011 | January White Sale | Loretta Howard Gallery, New York, NY<br />\r\n2011 | Surfboards by Clement Greenberg | Weber Fine Art, Greenwich, CT<br />\r\n2011 | Seventh Dream of Teenage Heaven | Columbus College of Art and Design, Columbus, Ohio and Bennington College, catalogue<br />\r\n2011 | Flag Day | Islip Art Museum, Islip, NY<br />\r\n2010 | Still Life | Treasures from the Parrish Art Museum<br />\r\n2010 | Swell art 1950-2010 | Metro Pictures, Fredrich Petzel, NyeHaus, New York, NY<br />\r\n2010 | Peter Saville: Accessories To An Artwork | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n2010 | Think Pink | Curated by Beth Rudin DeWoody, Gavlak, Palm Beach, FL<br />\r\n2010 | Accessories to a Plinth | Glenn Horowitz, East Hampton, NY<br />\r\n2009 | Mixed Greens: Artists Choose Artists | Parrish Art Museum, Southampton, NY<br />\r\n2007 | The Crown Jewels | Salon 94 Freemans, New York, NY<br />\r\n2007 | The Drawing Room, East Hampton, NY<br />\r\n2007 | What&rsquo;s Your Hobby? | Curated by Beth Rudin DeWoody | Fireplace Project, East Hampton, NY<br />\r\n2006 | The Food Show: The Hungry Eye | Chelsea Art Museum , NY<br />\r\n2006 | The Garden on Paper | The Drawing Room, East Hampton, NY<br />\r\n2005 | Alive and Kicking, Six Feet Under | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n2005 | Affinities | The Drawing Room, East Hampton, NY<br />\r\n2004 | Fresh Paint | Hampton Road Gallery, Southampton, NY<br />\r\n2004 | Six at Glenn Horowitz | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n2003 | Genomic Issue(s) | Santa Barbara Museum of Art at CUNY Graduate Art Center, New York, NY<br />\r\n2002 | Catch of the Day | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n2002 | Systems of Nature | Devin Borden Hiram Butler, Houston, TX<br />\r\n2002 | Flora | Cook Fine Art, New York, NY<br />\r\n2002 | The Insane Lords of Love | AE Gallery, East Hampton, NY<br />\r\n2002 | Revealing Nature | Glenn Horowitz Bookseller, East Hampton, NY<br />\r\n2001 | Global Village | Guild Hall Museum, East Hampton, NY<br />\r\n1999 | Souvenirs: Collecting, Memory and Material Culture | Guild Hall Museum, East Hampton, NY<br />\r\n1999 | Black &amp; White | Malca Fine Art, New York, NY<br />\r\n1998 | Blooming | Karen McCready Fine Art, New York, NY<br />\r\n1997 | Liste &rsquo;97 Art Fair | Basel, Switzerland<br />\r\n1997 | Gramercy International | Chateau Marmont, Morris Healy Gallery, Los Angeles, CA<br />\r\n1997 | American Art Today: The Garden (catalog) | Florida International University Art Museum, Miami, FL<br />\r\n1997 | Gramercy International | Morris Healy Gallery, Miami, FL<br />\r\n1997 | Glorious Gardens | Bonnie Benrubi Gallery, New York, NY<br />\r\n1996 | Liste &rsquo;96 Art Fair | Morris Healy Gallery, Basel, Switzerland<br />\r\n1996 | In Bloom (catalogue) | Jersey Center for the Arts, Summit, NJ<br />\r\n1995 | Group Exhibition | Beth Urdang Gallery, Boston, MA<br />\r\n1995 | Gramercy International Art Fair | Paul Morris Gallery, New York, NY<br />\r\n1995 | Inaugural Exhibition | Paul Morris Gallery, New York, NY<br />\r\n1994 | small paintings | Paul Morris Gallery, New York, NY<br />\r\n1994 | Desire | Charles Cowles Gallery, New York, NY<br />\r\n1994 | Gramercy International Art Fair | Paul Morris Gallery, New York, NY<br />\r\n1994 | Rhythm Bouquet | 555 Broome Street, New York, NY<br />\r\n1994 | 34th Juried Exhibition | Parrish Art Museum, Southampton, NY<br />\r\n1994 | New from New York | Montgomery Glasoe Fine Art, Minneappolis, MN<br />\r\n1993 | Renee Fotouhi Fine Art East, East Hampton, NY<br />\r\n1992 | Vered Gallery, East Hampton, NY<br />\r\n1991 | Sotavento, Caracas, Venezuel</p>\r\n\r\n<p><strong>Selected Commissions</strong><br />\r\n2013 | Le 68 Guy Martin, Guerlain, 68 Champs-Elysees, Paris, France<br />\r\n2013 | Grey Area, &ldquo;Wallflowers,&rdquo; Design Collective, New York, NY</p>\r\n\r\n<p><strong>Bibliography</strong><br />\r\n2014, November | &ldquo;Queen Bee, The House of Guerlain Celebrates the 160th Anniversary of the Bee Bottle&rdquo; | C.F., Styling Magazine<br />\r\n2013, June 19 | &ldquo;No Shrinking Violets Here&rdquo; | Arlene Hirst, The New York Times<br />\r\n2013, September | Mark Rozzo, Town and Country, pg 78<br />\r\n2011, July 21 | &ldquo;Not That Kind of Nose Job&rdquo; | Randy Kennedy, The New York Times<br />\r\n2011, August 1 | &ldquo;Discarded Warplanes Become Art on LI&rdquo; | Marissa Cox, Newsday<br />\r\n2010, July 23 | &ldquo;When Artists And Surfers Were Best Buddies&rdquo; | Roberta Smith, The New York Times<br />\r\n2009, May 31 | &ldquo;Artists Picking The Artists&rdquo; | Benjamin Genocchio, The New York Times<br />\r\n2008, June | &ldquo;Waxing Poetic&rdquo; | Taylor Antrim, ForbesLife<br />\r\n2008&nbsp; December 25 | Black Boards, White Chicks Combo | Wendy Jacobson, East Hampton Star<br />\r\n2007, February 2 | The Food Show: &ldquo;The Hungry Eye&rdquo; | Megan Heuer, ARTnews<br />\r\n2005, Spring | &lsquo;&rsquo;Coco in Tokyo&rsquo;&rsquo; | Surface Magazine<br />\r\n2004, November | &ldquo;Talking Fashion&rdquo; | Norwich Notes by William Norwich, Vogue<br />\r\n2004, July 11 | &ldquo;Beautiful and No Water Required&rdquo; | Helen A. Harrison, The New York Times<br />\r\n2004, July 8 | &ldquo;More Than Just Pretty Pictures&rdquo; | Eric Ernst, The Southampton Press<br />\r\n2003, February/March | Feature Article | Elle D&eacute;cor<br />\r\n2002, October 10 | &ldquo;15 at Horowitz&rdquo; | Robert Long, East Hampton Star<br />\r\n2002 | &ldquo;Unframed: Artists Respond to Aids&rdquo; | Sotheby&rsquo;s and Rush Philanthropic Arts Foundation, Powerhouse Books<br />\r\n2002 | &ldquo;Studios By the Sea&rdquo; | Jonathan Becker and Bob Colacello, Abrams<br />\r\n2002, March 7 | &ldquo;Naughty and Nice Valentines&rdquo; | Robert Long, East Hampton Star<br />\r\n2001, January 7 | &ldquo;The Things that Flesh Falls Vulnerable To&rdquo; | Phyllis Braff, The New York Times<br />\r\n2001, May 3 | &ldquo;From the Studio&rdquo; | Rose Slivka, The East Hampton Star<br />\r\n2001, May 10 | &ldquo;A Global Village of Contemporary Artists...&rdquo; | Pat Rogers, The Southampton Press<br />\r\n2001, May 13 | &ldquo;A Global Village&rdquo; | Phyllis Braff, The New York Times<br />\r\n2000, May 21 | &ldquo;The Garden Path&rdquo; | William Norwich, The New York Times Magazine<br />\r\n2000, August | &ldquo;Hamptons by the Brush&rdquo; | Bob Colacello, Vanity Fair<br />\r\n2000, August 14 | &ldquo;Galleries Uptown&rdquo; | Edel Rodriguez, The New Yorker<br />\r\n2000, December 7 | &ldquo;From the Studio&rdquo; | Rose Slivka, The East Hampton Star<br />\r\n2000, December 28 | &ldquo;A Flower Power Collagist&rdquo; | Ilene Roizman, The East Hampton Star<br />\r\n1997, January 5 | &ldquo;Art Miami &rsquo;97: Gramercy Shine Cultural Spotlight&rdquo; | The Miami Herald<br />\r\n1997, June 6 | &ldquo;Finding Fresh Images in an Evergreen Subject&rdquo; | The New York Times<br />\r\n1996, November | &ldquo;City Guide&rdquo; | Vogue, Index<br />\r\n1996, December | &ldquo;Morris Healy Gallery&rdquo; | Penthouse, Japan</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `perms_id` bigint(11) NOT NULL,
  `perms_page` varchar(255) NOT NULL DEFAULT '',
  `users_id` int(11) NOT NULL DEFAULT '0',
  `perms_perms` tinyint(1) NOT NULL COMMENT '0 = none, 1 = Edit, 2 = Edit Delete'
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
  `portfolios_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gdate` date NOT NULL,
  `content` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE IF NOT EXISTS `press` (
  `press_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL DEFAULT '0',
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `press`
--

INSERT INTO `press` (`press_id`, `title`, `author`, `descr`, `date`, `image`, `publication`, `_order`) VALUES
(10, 'A Title', 'An Author', '', 'Mar 2016', 'batman-workout_1457976273.pdf', 'Popular Mechanics', 2),
(11, 'Cats', 'Meowth Animala', '', 'Jan 2000', 'coloring_book_1457976359.pdf', 'Cat Fancy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projects_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `_order` int(11) NOT NULL,
  `architect` varchar(255) NOT NULL,
  `system_type` varchar(255) NOT NULL,
  `_size` varchar(255) NOT NULL,
  `builder` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `specs` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projects_id`, `title`, `year`, `_order`, `architect`, `system_type`, `_size`, `builder`, `thumb`, `specs`) VALUES
(17, 'Exteriors', '', 2, '', '', '', '', '', ''),
(16, 'Interiors', '', 1, '', '', '', '', '', ''),
(18, 'Featured', '', 3, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE IF NOT EXISTS `sidebar` (
  `sidebar_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_home` tinyint(4) DEFAULT '0',
  `url` tinytext COLLATE utf8_unicode_ci,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`sidebar_id`, `image`, `is_home`, `url`, `_order`) VALUES
(1, '245258-cats-cute-white-cat_1459942178.jpg', 0, NULL, 2),
(2, 'AdobeStock_53651602.jpeg_1459942274.peg', 0, NULL, 3),
(3, 'AdobeStock_66164436.jpeg_1459942412.peg', 0, NULL, 4),
(4, 'AdobeStock_66718462.jpeg_1459942464.peg', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_home` tinyint(4) DEFAULT '0',
  `url` tinytext COLLATE utf8_unicode_ci,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`, `is_home`, `url`, `_order`) VALUES
(19, 'INTRO-02_1460138071.jpg', 0, NULL, 0),
(18, 'INTRO-01_1460138063.jpg', 0, NULL, 0),
(20, 'INTRO-03_1460138078.jpg', 0, NULL, 0),
(21, 'INTRO-04_1460138084.jpg', 0, NULL, 0),
(22, 'INTRO-05_1460138091.jpg', 0, NULL, 0),
(23, 'INTRO-06_1460138098.jpg', 0, NULL, 0),
(24, 'INTRO-07_1460138104.jpg', 0, NULL, 0),
(25, 'INTRO-08_1460138111.jpg', 0, NULL, 0),
(26, 'INTRO-09_1460138117.jpg', 0, NULL, 0),
(27, 'INTRO-10_1460138126.jpg', 0, NULL, 0),
(28, 'INTRO-11_1460138132.jpg', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `testimonials_id` int(11) NOT NULL,
  `testimonial` text COLLATE utf8_unicode_ci NOT NULL,
  `_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `testimonial`, `_order`) VALUES
(1, 'I love the fact that it is super compact for a full size sleeping bag. I camp every year and recently started water rafting. This ultra portable sleeping bag will be useful because of its small size when in the carry bag. The carry bag itself is only about a foot by half foot cylinder and looks great with the light brown strapping. It is a tiny carry bag and super light. It is well constructed and feels like a down jacket. It is not puffy at all. All in all it is a good product and a good buy.', 0),
(2, 'I like this mess kit. It''s slicker than the others I have used, so it''s easier to clean up after use. I''m not overly impressed with the ladle or spork--they are not easily folded/unfolded. As for the slice of luffa--that''s not a big deal either. I do like the stubby rice paddle though, even if it does have pretty limited use.', 0),
(3, 'Great mug! It says its for camping but I use it everyday at home. It keeps the coffee warm, but I love the toughness and ruggedness of the mug. It is thick stainless steel. They did not skimp on quality at all. I''ve even started drinking bourbon out of it. Its just so cool and heavy and strong. Its a man''s mug!', 0),
(4, 'This tape is very sticky. It has worked better than duct tape for me in most instances. The handy roll is great for hiking or camping. I always toss a roll in my backpack. Believe it or not my hiking buddies and I use it like moleskin. If we feel a blister developing we tape the area. It doesn''t have the same tendency to roll up as moleskin so it stays on longer. It''s pretty easy to forget it''s even there. Also used it to patch a hole in my tent and it held well even given the moisture. I''ll bet I could set a broken leg with it in a pinch. I''ll keep you updated.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(255) NOT NULL DEFAULT '',
  `users_lname` varchar(255) NOT NULL DEFAULT '',
  `users_name` varchar(255) NOT NULL DEFAULT '',
  `users_warcraft` varchar(255) NOT NULL DEFAULT '',
  `users_email` varchar(255) NOT NULL DEFAULT '',
  `users_last_online` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `account_type_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '2 = admin 1 = user 0 = guest',
  `users_inital_visit` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_name`, `users_warcraft`, `users_email`, `users_last_online`, `account_type_id`, `users_inital_visit`) VALUES
(1, 'Shoshi', 'Admin', 'Shoshi Admin', '14e9c8c32f5f8ef01aac2d67628a23b5', 'admin@shoshibuilders.com', '2016-07-08 09:56:05', 2, '2016-07-08'),
(72, 'Chris', 'Bond', 'Chris Bond', 'a314802ae33d1ee2a1df8b3474855697', 'chris.bond@firespike.com', '2016-03-11 10:30:21', 1, '2016-03-11'),
(79, 'John', 'Musnicki', 'John Musnicki', 'c4367688c328e409a9137358255b35e3', 'john@graphicimagegroup.com', '2016-07-08 13:17:15', 2, '2016-07-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `forgotten`
--
ALTER TABLE `forgotten`
  ADD PRIMARY KEY (`forgotten_id`), ADD UNIQUE KEY `users_email` (`users_email`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`images_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perms_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolios_id`);

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`press_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projects_id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`sidebar_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonials_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `forgotten`
--
ALTER TABLE `forgotten`
  MODIFY `forgotten_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=393;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perms_id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolios_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `press_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projects_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `sidebar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonials_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
