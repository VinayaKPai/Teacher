-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 09:38 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vkpsolut_teachers_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_Id` int(11) NOT NULL,
  `assessment_Title` varchar(250) NOT NULL,
  `assessment_questions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_Id`, `assessment_Title`, `assessment_questions`) VALUES
(1, 'Trial assignment', '7,8,9'),
(2, 'asdf', '3,4'),
(3, 'Combisave 1', '11,13,16'),
(4, 'combisave 2', '481,482,483,484'),
(5, 'Trial quiz', '481,482,483');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classId` int(11) NOT NULL,
  `classNumber` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classId`, `classNumber`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(9, 'IX'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII'),
(10, 'X'),
(11, 'XI'),
(12, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `classes_taught_by_teacher`
--

CREATE TABLE `classes_taught_by_teacher` (
  `cttId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes_taught_by_teacher`
--

INSERT INTO `classes_taught_by_teacher` (`cttId`, `teacherId`, `classId`, `sectionId`, `subjectId`) VALUES
(12, 1, 4, 3, 1),
(19, 1, 5, 4, 7),
(4, 1, 6, 1, 3),
(9, 1, 10, 2, 11),
(50, 2, 1, 1, 1),
(10, 2, 4, 3, 1),
(47, 2, 5, 2, 8),
(13, 2, 6, 1, 12),
(20, 2, 7, 3, 8),
(1, 2, 8, 3, 9),
(22, 3, 5, 1, 11),
(45, 3, 5, 2, 11),
(49, 3, 5, 3, 11),
(11, 3, 6, 6, 5),
(3, 3, 7, 1, 11),
(21, 3, 7, 2, 11),
(14, 3, 8, 5, 11),
(52, 4, 9, 2, 9),
(6, 4, 9, 4, 10),
(15, 4, 10, 6, 13),
(7, 4, 12, 5, 6),
(5, 5, 10, 2, 4),
(16, 5, 12, 2, 5),
(17, 6, 2, 4, 10),
(53, 7, 1, 1, 2),
(2, 7, 2, 1, 1),
(8, 7, 2, 6, 2),
(18, 7, 3, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `deploymentlog`
--

CREATE TABLE `deploymentlog` (
  `depId` int(11) NOT NULL COMMENT 'Auto generated unique id for the deployment',
  `depType` set('A','Q','T') NOT NULL COMMENT 'Specifies whether the dep is a quiz, a test or an assignment',
  `sectionId` int(11) NOT NULL,
  `assessmentId` int(11) NOT NULL COMMENT 'This is the id of the deployment in the assessment table',
  `schStartDate` date NOT NULL COMMENT 'This is created at the time of setting up deployment. Need not mean that the deployment happened.',
  `schEndDate` date NOT NULL COMMENT 'This would be the date after which responses would not be accepted.',
  `autoReminderDays` tinyint(3) NOT NULL COMMENT 'To be set to a negative number. Will be used to calculate reminder date',
  `deploySuccess` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'This will be a 0 or 1 depending on whether the deployment is successful or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE `questionbank` (
  `qId` int(4) NOT NULL,
  `classId` varchar(4) NOT NULL,
  `subjectId` varchar(25) NOT NULL,
  `topicId` varchar(100) NOT NULL,
  `typeId` varchar(5) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `Option_1` varchar(50) NOT NULL,
  `Option_2` varchar(50) NOT NULL,
  `Option_3` varchar(50) NOT NULL,
  `Option_4` varchar(50) NOT NULL,
  `Option_5` varchar(50) NOT NULL,
  `Option_6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`qId`, `classId`, `subjectId`, `topicId`, `typeId`, `question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Option_5`, `Option_6`) VALUES
(1, '2', '4', '7', '2', '____ helps clean the house. ', 'Doorman ', 'Maid ', 'Valet ', 'Shopkeeper ', 'None of these', ''),
(2, '9', '5', '6', '2', 'Two Treatises of Government\' was written by:', 'Rousseau', 'John Locke', 'Montesquieu', 'None of these', '', ''),
(3, '9', '5', '6', '2', 'Passive citizens of France were:', 'Only men above 25 years', 'Only propertied men', 'Men and women who didn\'t vote', 'Only propertied women', '', ''),
(4, '9', '5', '6', '2', 'Marseilles\' was a: ', 'Representative of third e3te?', 'National anthem of France', 'Political club?', 'Militia', '', ''),
(5, '9', '5', '6', '2', 'Directory\' means:', 'Addresses of the Legis1ive Council', 'Formed by the military dictator', 'An executive made up of five members', 'List of names', '', ''),
(6, '9', '5', '6', '2', 'Napoleon Bonaparte was defeated in:', 'Battle of Paris', 'Battle of Ecuador', 'Battle of Waterloo', 'Battle of Plassey', '', ''),
(7, '2', '4', '7', '2', 'Which one of the following catches thieves and helps to search for lost things?', 'Engineer', 'Nurse ', 'Policeman ', 'Doctor ', 'None of these', ''),
(8, '2', '4', '7', '2', 'Which one of the following is used to send messages by using post office? ', 'Postcard ', 'Letter ', 'E-mail ', 'Both [a] and [b] ', 'None of these', ''),
(9, '2', '4', '7', '2', '____ helps to put out the fire. ', 'Fireman ', 'Policeman ', 'Carpenter ', 'Shopkeeper ', 'None of these', ''),
(10, '2', '4', '7', '2', 'We send things to different places by: ', 'Letters', 'Parcel ', 'Postcard ', 'All the above ', 'None of these', ''),
(11, '2', '4', '7', '2', 'When we are sick, we go to a: ', 'Hospital', 'Fire 3tion ', 'ATM ', 'Police  3tion ', 'None of these', ''),
(12, '2', '4', '7', '2', 'Which one of the following is the main festival of Christians? ', 'Guru Purav', 'Gandhijayanti ', 'Christmas ', 'Eid ', 'None of these', ''),
(13, '2', '4', '7', '2', '_____ is a place where we learn to study. ', 'Bus stop', 'School ', 'Railway  3tion ', 'Hospital ', 'None of these', ''),
(14, '2', '4', '7', '2', 'If we need a table made of wood and we have the required wood, then we have to go to: ', 'Electrician', 'Blacksmith ', 'Carpenter ', 'Chemist ', 'None of these', ''),
(15, '2', '4', '7', '2', 'Where do we keep our money? ', 'Hospital', 'Police 3tion ', 'Bank ', 'School ', 'None of these', ''),
(16, '2', '4', '7', '2', 'Who looks after us in a hospital? ', 'Teacher', 'Sweeper ', 'Police man ', 'Nurse ', 'None of these', ''),
(17, '2', '4', '7', '2', 'ATM refers to: ', 'Automatic total money', 'Automatic teller money ', 'Automated teller machine ', 'Automatic table money ', 'None of these', ''),
(18, '2', '4', '7', '2', 'Which one of the following helps us to blow out the fire? ', 'Ambulance', 'Fire Brigade ', 'Bicycle ', 'Chariot ', 'None of these', ''),
(19, '2', '4', '7', '2', 'Which one of the following is not found in a hospital? ', 'Nurse', 'Stethoscope ', 'Doctor ', 'Sick person ', 'None of these', ''),
(20, '2', '4', '7', '2', 'Which is our first school? ', 'Neighbourhood', 'Garden ', 'Playground ', 'Family ', 'None of these', ''),
(21, '2', '4', '7', '2', '____ prescribes medicines to us. ', 'Chemist', 'Doctor ', 'Nurse ', 'Teacher ', 'None of these', ''),
(22, '2', '4', '7', '2', 'The given image belongs to which of the following?? ', 'Painter', 'Carpenter ', 'Tailor ', 'Cobbler ', 'None of these', ''),
(23, '2', '4', '7', '2', 'Who among the following f9es pipes and taps? ', 'Cobbler', 'Plumber ', 'Tailor ', 'Green grocers ', 'None of these', ''),
(24, '2', '4', '7', '2', 'We buy vegetables from: ', 'Black smith', 'Green grocers ', 'Carpenter ', 'Plumber ', 'None of these', ''),
(25, '2', '4', '7', '2', 'You want to buy a painkiller for headache. To whom will you go? ', 'Green  grocer', 'Chemist ', 'Surgeon ', 'Doctor ', 'None of these', ''),
(26, '2', '4', '7', '2', 'Who built san iron gate among the following? ', 'Goldsmith', 'Blacksmith ', 'Carpenter ', 'Painter ', 'None of these', ''),
(27, '9', '5', '6', '4', 'Between which three continents triangular slave trade was held?', '', '', '', '', '', ''),
(28, '9', '5', '6', '3', 'Describe the French division of society.', '', '', '', '', '', ''),
(29, '9', '5', '6', '4', 'Describe the incident which sparked the Revolution.', '', '', '', '', '', ''),
(30, '9', '5', '6', '1', 'Describe the main features of the constitution of 1791 drafted by National Assembly.', '', '', '', '', '', ''),
(31, '9', '5', '6', '4', 'Describe the main ideas contained in the Declaration of Rights of Man and Citizen.', '', '', '', '', '', ''),
(32, '9', '5', '6', '3', 'Differentiate between Active and Passive Citizens.', '', '', '', '', '', ''),
(33, '9', '5', '6', '3', 'Elucidate the contribution of Mirabeau in the formation of the National Assembly?', '', '', '', '', '', ''),
(34, '9', '5', '6', '4', 'For modernizing France which two laws were enforced by Napoleon Bonaparte?', '', '', '', '', '', ''),
(35, '9', '5', '6', '1', 'How can you say that Louis XVI was a despotic ruler?', '', '', '', '', '', ''),
(36, '9', '5', '6', '4', 'How did American war of Independence add more debt to France?', '', '', '', '', '', ''),
(37, '9', '5', '6', '3', 'How did peasants protest against the feudal lords or nobles of France?', '', '', '', '', '', ''),
(38, '9', '5', '6', '1', 'How did the fall of Bastille prison become the immediate cause of French Revolution?', '', '', '', '', '', ''),
(39, '9', '5', '6', '3', 'How did the French people ultimately get the right to vote to all citizens?', '', '', '', '', '', ''),
(40, '9', '5', '6', '3', 'How did women suffer in France?', '', '', '', '', '', ''),
(41, '9', '5', '6', '4', 'How was division of power suggested by philosopher Montesquieu?', '', '', '', '', '', ''),
(42, '9', '5', '6', '1', 'How was National Assembly recognised?', '', '', '', '', '', ''),
(43, '9', '5', '6', '1', 'How was slave trade 3rted? When and how was it abolished? OR Prepare a short note on \'Slave Trade\'.', '', '', '', '', '', ''),
(44, '9', '5', '6', '4', 'How was the meeting of E3tes General called by Louis XVI attended by three E3tes?', '', '', '', '', '', ''),
(45, '9', '5', '6', '3', 'How was the National Assembly recognised and how did it 3rt exercising its powers?', '', '', '', '', '', ''),
(46, '9', '5', '6', '4', 'How would you explain the rise of Napoleon?', '', '', '', '', '', ''),
(47, '9', '5', '6', '4', 'In which famous battle was Napoleon finally defeated? Where was he imprisoned?', '', '', '', '', '', ''),
(48, '9', '5', '6', '4', 'In which famous war was Napoleon Bonaparte defeated?', '', '', '', '', '', ''),
(49, '9', '5', '6', '4', 'Mention one activity of the French monarchy which hastened the Revolution.', '', '', '', '', '', ''),
(50, '9', '5', '6', '4', 'Name the famous work by Rousseau which lays down the main principles of democracy.', '', '', '', '', '', ''),
(51, '9', '5', '6', '4', 'Name the French ports through which slave trade was done.', '', '', '', '', '', ''),
(52, '9', '5', '6', '4', 'Name the important political clubs formed by women in France to fight their political rights.', '', '', '', '', '', ''),
(53, '9', '5', '6', '4', 'Name the three main social classes in 18th Century France.', '', '', '', '', '', ''),
(54, '9', '5', '6', '4', '3te anyone law passed by Napoleon.', '', '', '', '', '', ''),
(55, '9', '5', '6', '4', 'What decisive factor led to the fall of Napoleon?', '', '', '', '', '', ''),
(56, '9', '5', '6', '4', 'What do you know about Abbe Sieyes.', '', '', '', '', '', ''),
(57, '9', '5', '6', '3', 'What do you know about the ?E3tes General??', '', '', '', '', '', ''),
(58, '9', '5', '6', '3', 'What do you know about the political clubs formed in France?', '', '', '', '', '', ''),
(59, '9', '5', '6', '4', 'What do you under3nd by the word ?Revolution??', '', '', '', '', '', ''),
(60, '9', '5', '6', '4', 'What does \'Chateau\' mean?', '', '', '', '', '', ''),
(61, '9', '5', '6', '4', 'What does \'subsistence crisis\' mean?', '', '', '', '', '', ''),
(62, '9', '5', '6', '1', 'What does subsistence crisis mean? What led to subsistence crisis in France?', '', '', '', '', '', ''),
(63, '9', '5', '6', '4', 'What is a guillotine?', '', '', '', '', '', ''),
(64, '9', '5', '6', '1', 'What is the role of middle classes in ending the privileges?', '', '', '', '', '', ''),
(65, '9', '5', '6', '3', 'What is the role of philosophers in the French Revolution?', '', '', '', '', '', ''),
(66, '9', '5', '6', '4', 'What led to the triangular slave trade?', '', '', '', '', '', ''),
(67, '9', '5', '6', '4', 'What privileges did members of the first two e3tes enjoy?', '', '', '', '', '', ''),
(68, '9', '5', '6', '3', 'What rights were provided by the French Constitution?', '', '', '', '', '', ''),
(69, '9', '5', '6', '4', 'What role did the French philosophers play in the outbreak of the French Revolution?', '', '', '', '', '', ''),
(70, '9', '5', '6', '3', 'What was a \'Directory\'? Why was it removed from France?', '', '', '', '', '', ''),
(71, '9', '5', '6', '4', 'What was a \'Manor\'?', '', '', '', '', '', ''),
(72, '9', '5', '6', '4', 'What was \'Directory\'?', '', '', '', '', '', ''),
(73, '9', '5', '6', '3', 'What was Guillotine? How was it used?', '', '', '', '', '', ''),
(74, '9', '5', '6', '4', 'What was Guillotine?', '', '', '', '', '', ''),
(75, '9', '5', '6', '4', 'What was \'Marseillaise\'?', '', '', '', '', '', ''),
(76, '9', '5', '6', '1', 'What was Marseillaise? What led to the formation of Marseillaise?', '', '', '', '', '', ''),
(77, '9', '5', '6', '4', 'What was taille?', '', '', '', '', '', ''),
(78, '9', '5', '6', '4', 'What was the E3tes General?', '', '', '', '', '', ''),
(79, '9', '5', '6', '4', 'What was the immediate cause of French Revolution?', '', '', '', '', '', ''),
(80, '9', '5', '6', '3', 'What was the immediate cause of the French Revolution?', '', '', '', '', '', ''),
(81, '9', '5', '6', '4', 'What was the main aim of the National Assembly?', '', '', '', '', '', ''),
(82, '9', '5', '6', '4', 'What was the meaning of the following symbol - The broken chain?', '', '', '', '', '', ''),
(83, '9', '5', '6', '4', 'What was the most important legacy of the French Revolution?', '', '', '', '', '', ''),
(84, '9', '5', '6', '4', 'What was the National Anthem of France?', '', '', '', '', '', ''),
(85, '9', '5', '6', '4', 'What was tithe?', '', '', '', '', '', ''),
(86, '9', '5', '6', '4', 'What were political clubs?', '', '', '', '', '', ''),
(87, '9', '5', '6', '1', 'What were the main causes of the French Revolution?', '', '', '', '', '', ''),
(88, '9', '5', '6', '4', 'What were the views of John Locke in inspiring the people for French Revolution?', '', '', '', '', '', ''),
(89, '9', '5', '6', '4', 'What work did women of the third e3te do?', '', '', '', '', '', ''),
(90, '9', '5', '6', '4', 'When did women finally get the right to vote in France?', '', '', '', '', '', ''),
(91, '9', '5', '6', '3', 'When had France become a Republic?', '', '', '', '', '', ''),
(92, '9', '5', '6', '4', 'When Napoleon Bonaparte did became Emperor of France?', '', '', '', '', '', ''),
(93, '9', '5', '6', '4', 'When the draft of the National Assembly?s constitution completed and what was its main objective?', '', '', '', '', '', ''),
(94, '9', '5', '6', '4', 'When was National Assembly recognised?', '', '', '', '', '', ''),
(95, '9', '5', '6', '4', 'When was slavery finally abolished in France?', '', '', '', '', '', ''),
(96, '9', '5', '6', '4', 'When was the Bastille Prison stormed?', '', '', '', '', '', ''),
(97, '9', '5', '6', '1', 'Which incident had led to the outbreak of the revolution in France?', '', '', '', '', '', ''),
(98, '9', '5', '6', '3', 'Which laws were made to improve the 3tus of women in the French society?', '', '', '', '', '', ''),
(99, '9', '5', '6', '4', 'Which new Assembly was formed by Jacobins?', '', '', '', '', '', ''),
(100, '9', '5', '6', '4', 'Which proposal of the third e3te was rejected by E3tes General?', '', '', '', '', '', ''),
(101, '9', '5', '6', '4', 'Which ruler came to power in France in 1774?', '', '', '', '', '', ''),
(102, '9', '5', '6', '4', 'Which social groups emerged as \'middle class\' in 18th century France?', '', '', '', '', '', ''),
(103, '9', '5', '6', '4', 'Which was the popular France? Club of France? Who was its leader?', '', '', '', '', '', ''),
(104, '9', '5', '6', '4', 'Who all got the right to vote for National Assembly?', '', '', '', '', '', ''),
(105, '9', '5', '6', '4', 'Who composed the French National Anthem?', '', '', '', '', '', ''),
(106, '9', '5', '6', '4', 'Who could qualify as an Elector?', '', '', '', '', '', ''),
(107, '9', '5', '6', '4', 'Who formed the First and Second E3tes of French Society?', '', '', '', '', '', ''),
(108, '9', '5', '6', '1', 'Who formed the Jacobin Club? What measures had he taken to remove discrimination in the French society and form a French Republic?', '', '', '', '', '', ''),
(109, '9', '5', '6', '4', 'Who introduced \'Reign of terror\' in France?', '', '', '', '', '', ''),
(110, '9', '5', '6', '4', 'Who invented the guillotine?', '', '', '', '', '', ''),
(111, '9', '5', '6', '1', 'Who represented the National Assembly on 5th May 1789?', '', '', '', '', '', ''),
(112, '9', '5', '6', '4', 'Who was Mirabeau?', '', '', '', '', '', ''),
(113, '9', '5', '6', '1', 'Who was Napoleon Bonaparte? Why was he called a liberator?', '', '', '', '', '', ''),
(114, '9', '5', '6', '4', 'Who was Rousseau?', '', '', '', '', '', ''),
(115, '9', '5', '6', '4', 'How Robespierre\'s end came?', '', '', '', '', '', ''),
(116, '9', '5', '6', '4', 'Who was the leader of Jacobin club?', '', '', '', '', '', ''),
(117, '9', '5', '6', '4', 'Who were electors?', '', '', '', '', '', ''),
(118, '9', '5', '6', '4', 'Who were \'Sans-Culottes\'?', '', '', '', '', '', ''),
(119, '9', '5', '6', '4', 'Who were the Sans-Culottes?', '', '', '', '', '', ''),
(120, '9', '5', '6', '4', 'Whom did Louis XVI get married to?', '', '', '', '', '', ''),
(121, '9', '5', '6', '4', 'Why did the French government increase the taxes?', '', '', '', '', '', ''),
(122, '9', '5', '6', '4', 'Why was Bastille Prison attacked?', '', '', '', '', '', ''),
(123, '9', '5', '6', '4', 'Why was treasury empty when Louis XVI ascended the throne?', '', '', '', '', '', ''),
(124, '9', '5', '6', '3', 'Describe any four causes of the French Revolution. Or Describe the circum3nces leading to the outbreak of revolutionary in France.', '', '', '', '', '', ''),
(125, '9', '5', '6', '3', 'What role did the philosophers play in bringing about the French Revolution?', '', '', '', '', '', ''),
(126, '9', '5', '6', '3', 'Why is the Declaration of the Rights of t-Ian and Citizen regarded as a revolutionary document?', '', '', '', '', '', ''),
(127, '9', '5', '6', '3', 'What role did Louis XVI play in bringing about the revolution?', '', '', '', '', '', ''),
(128, '9', '5', '6', '3', 'Give an estimate of Napoleon Bonaparte as the First Consul.', '', '', '', '', '', ''),
(129, '9', '5', '6', '3', 'What was the impact of the French Revolution on the world? Or Describe the legacy of the French Revolution for the peoples of the world during the 19th and 20th centuries.', '', '', '', '', '', ''),
(130, '9', '5', '6', '3', 'Which groups of French society benefited from the revolution? Which groups were forced to relinquish power? Which sections of society would have been disappointed with the outcome of the revolution?', '', '', '', '', '', ''),
(131, '9', '5', '6', '3', 'Draw up a list of democratic rights we enjoy today whose origins could be traced to the French Revolution.', '', '', '', '', '', ''),
(132, '9', '5', '6', '3', 'How was French society organized? What privileges did certain sections of society enjoy? Or What was the system of e3tes in French Society during the 1e eighteenth century?', '', '', '', '', '', ''),
(133, '9', '5', '6', '3', 'What measures were taken by Robespierre\'s government?', '', '', '', '', '', ''),
(134, '9', '5', '6', '3', 'What role did women play during the revolutionary years?', '', '', '', '', '', ''),
(135, '9', '5', '6', '3', 'What laws were passed by the revolutionary government for the benefit of women?', '', '', '', '', '', ''),
(136, '9', '5', '6', '3', 'How did the revolutionary governments trans1e the ideals of liberty and equality into everyday practice?', '', '', '', '', '', ''),
(137, '9', '5', '6', '3', 'Why the period from 1793 to 1794 in France is referred to as the Reign of Terror?', '', '', '', '', '', ''),
(138, '9', '5', '6', '1', 'How did the teachings of Rousseau lay the foundations of democracy?', '', '', '', '', '', ''),
(139, '9', '5', '6', '1', 'List the accomplishments of the National Assembly of France from 1789 to 1791. J. What was the impact of the French Revolution on France?', '', '', '', '', '', ''),
(140, '9', '5', '6', '1', 'What was the impact of the French Revolution on France?', '', '', '', '', '', ''),
(141, '9', '5', '6', '1', 'Write short notes on: (a) French slave trade (b) Reign of Terror (Fall of Napoleon.', '', '', '', '', '', ''),
(142, '9', '5', '6', '1', 'Write down the causes of French revolution and the principles on which it is based. Or Explain various that led to the outbreak of French revolution.', '', '', '', '', '', ''),
(143, '9', '5', '6', '1', 'Explain the role of Napolean Bonaparte as an Emperor of France in 1804 and also explain important contribution of the French revolution to the world.', '', '', '', '', '', ''),
(144, '9', '5', '6', '1', 'Explain the impact of French Revolution on France in everyday life of the people.', '', '', '', '', '', ''),
(145, '9', '5', '6', '1', 'Explain the conditions of France before the French Revolution with special reference to women\'s 3tus in the society.', '', '', '', '', '', ''),
(146, '9', '5', '8', '4', 'How does popu1ion become human capital? ', '', '', '', '', '', ''),
(147, '9', '5', '8', '4', 'What is the positive aspect of productive popu1ion? ', '', '', '', '', '', ''),
(148, '9', '5', '8', '4', 'Why is human resource superior to other resources like land and physical capital? ', '', '', '', '', '', ''),
(149, '9', '5', '8', '4', 'What is the role of education in the formation of human capital? ', '', '', '', '', '', ''),
(150, '9', '5', '8', '4', 'Define economic activity and give two examples.', '', '', '', '', '', ''),
(151, '9', '5', '8', '4', 'Define non-economic activity and give two examples.', '', '', '', '', '', ''),
(152, '9', '5', '8', '4', 'What does \'Sarva Siksha Abhiyan\' aim at?', '', '', '', '', '', ''),
(153, '9', '5', '8', '4', 'Define unemployment.', '', '', '', '', '', ''),
(154, '9', '5', '8', '4', 'Which two types of unemployment are common in rural areas?', '', '', '', '', '', ''),
(155, '9', '5', '8', '4', 'In which sector should India increase maximum employment opportunities?', '', '', '', '', '', ''),
(156, '9', '5', '8', '4', 'How does investment in human resource lead to higher returns in future?', '', '', '', '', '', ''),
(157, '9', '5', '8', '4', 'How is human resource different from other resources like land and physical capital?', '', '', '', '', '', ''),
(158, '9', '5', '8', '4', 'What does quality of popu1ion depend upon?', '', '', '', '', '', ''),
(159, '9', '5', '8', '4', 'Why are women employed in low paid work?', '', '', '', '', '', ''),
(160, '9', '5', '8', '4', 'How does investment in education help in human capital formation?', '', '', '', '', '', ''),
(161, '9', '5', '8', '4', 'Suggest some measures in the education system to mitigate problems of educated unemployed in India.', '', '', '', '', '', ''),
(162, '9', '5', '8', '4', 'How have countries like Japan become rich and developed?', '', '', '', '', '', ''),
(163, '9', '5', '8', '4', 'Why is literacy rate higher among males in India?', '', '', '', '', '', ''),
(164, '9', '5', '8', '4', 'Explain briefly the National Health Policy, 2002 launched by the government to promote health services in India', '', '', '', '', '', ''),
(165, '9', '5', '8', '4', 'Explain one negative and one positive aspect of large popu1ion.', '', '', '', '', '', ''),
(166, '9', '5', '8', '4', 'Define Infant mortality rate.', '', '', '', '', '', ''),
(167, '9', '5', '8', '4', 'What is meant by Birth rate?', '', '', '', '', '', ''),
(168, '9', '5', '8', '4', 'What is meant by death rate?', '', '', '', '', '', ''),
(169, '9', '5', '8', '4', 'Define Census.', '', '', '', '', '', ''),
(170, '9', '5', '8', '4', 'Define Literacy rate.', '', '', '', '', '', ''),
(171, '9', '5', '8', '4', 'Explain \'Life expectancy\'. What is meant by Sex-ratio? What is India\'s sex ratio according to 2001 census?', '', '', '', '', '', ''),
(172, '9', '5', '8', '3', 'Differentiate between economic and non-economic activities with help of examples.', '', '', '', '', '', ''),
(173, '9', '5', '8', '3', 'Differentiate between disguised unemployment and seasonal unemployment?', '', '', '', '', '', ''),
(174, '9', '5', '8', '3', 'Why is educated unemployment, a peculiar problem of India?', '', '', '', '', '', ''),
(175, '9', '5', '8', '3', 'What strategy has been adopted by the government in the Tenth Five Year Plan to improve the education sector?', '', '', '', '', '', ''),
(176, '9', '5', '8', '3', 'Is the increase in number of colleges adequate to admit the increasing number of students? Give reasons for your answer. The plan outlay on education has been increased.', '', '', '', '', '', ''),
(177, '9', '5', '8', '3', 'Which capital would you consider the best-land, labour, physical capital and human capital? Why?', '', '', '', '', '', ''),
(178, '9', '5', '8', '3', 'What steps have been taken to improve the quality of Education in India?', '', '', '', '', '', ''),
(179, '9', '5', '8', '3', 'Many children and women who are not working are not called unemployed. Why?', '', '', '', '', '', ''),
(180, '9', '5', '8', '3', 'What major changes indicate improvement of health in India?', '', '', '', '', '', ''),
(181, '9', '5', '8', '3', 'What facts indicate the growth of medical facilities in India?', '', '', '', '', '', ''),
(182, '9', '5', '8', '1', 'What are the different types of economic acclivities? Explain with help of examples.', '', '', '', '', '', ''),
(183, '9', '5', '8', '1', 'Discuss the growth of educational sector in India since 1951.', '', '', '', '', '', ''),
(184, '9', '5', '8', '1', 'How does human capital formation affect the growth of an economy?', '', '', '', '', '', ''),
(185, '9', '5', '8', '1', 'How does unemployment affect the overall grow1h of an economy?', '', '', '', '', '', ''),
(186, '9', '5', '8', '1', 'Do you think any firm would be induced to employ people who might not work efficiently as a healthy worker because of ill-health?', '', '', '', '', '', ''),
(187, '9', '5', '8', '1', 'Can you imagine some village which initially had no job opportunities but 1er came up with many', '', '', '', '', '', ''),
(188, '9', '5', '8', '6', 'Do you think the increase in the number of doctor and nurses is adequate for India? Give reasons for your answer.', '', '', '', '', '', ''),
(189, '9', '5', '8', '6', 'In which field do you think India can build the maximum employment opportunity?', '', '', '', '', '', ''),
(190, '9', '5', '8', '6', 'What is your idea about the future college and universities?', '', '', '', '', '', ''),
(191, '9', '5', '8', '4', 'How does Popu1ion become human capital?', '', '', '', '', '', ''),
(193, '9', '5', '8', '4', 'What is \'human capital formation\'?', '', '', '', '', '', ''),
(194, '9', '5', '8', '4', 'How can investment be made in human capital?', '', '', '', '', '', ''),
(195, '9', '5', '8', '4', 'How is human capital superior to other resources?', '', '', '', '', '', ''),
(196, '9', '5', '8', '4', 'How can a large popu1ion of India be turned as an asset rather than a liability?', '', '', '', '', '', ''),
(197, '9', '5', '8', '4', 'What kind of investment can be made on a child?', '', '', '', '', '', ''),
(198, '9', '5', '8', '4', 'How a vicious cycle is created by illiterate parents for their children?', '', '', '', '', '', ''),
(199, '9', '5', '8', '4', 'Why educated parents invest heavily on the education of their children?', '', '', '', '', '', ''),
(200, '9', '5', '8', '4', 'How have countries like Japan become rich and developed?', '', '', '', '', '', ''),
(201, '9', '5', '8', '4', 'Classify various activities on the basis of its economic benefit?', '', '', '', '', '', ''),
(202, '9', '5', '8', '4', 'What are Primary Activities?', '', '', '', '', '', ''),
(203, '9', '5', '8', '4', 'Which activities are included in Secondary sector?', '', '', '', '', '', ''),
(204, '9', '5', '8', '4', 'What are Tertiary Activities?', '', '', '', '', '', ''),
(205, '9', '5', '8', '4', 'What are economic activities?', '', '', '', '', '', ''),
(206, '9', '5', '8', '4', 'What are Market Activities?', '', '', '', '', '', ''),
(207, '9', '5', '8', '4', 'What are Non-Market Activities?', '', '', '', '', '', ''),
(208, '9', '5', '8', '4', 'How is division of labours made between men and women in the family', '', '', '', '', '', ''),
(209, '9', '5', '8', '4', 'Is women\'s work an economic activity?', '', '', '', '', '', ''),
(210, '9', '5', '8', '4', 'What are the major determinants of earnings?', '', '', '', '', '', ''),
(211, '9', '5', '8', '4', 'What are unorganised sectors?', '', '', '', '', '', ''),
(212, '9', '5', '8', '4', 'What kinds of jobs, attract women in organised sector?', '', '', '', '', '', ''),
(213, '9', '5', '8', '4', 'In which other sectors have women with high education and skill entered?', '', '', '', '', '', ''),
(214, '9', '5', '8', '4', 'On what factors the quality of popu1ion depends?', '', '', '', '', '', ''),
(215, '9', '5', '8', '4', 'How can popu1ion be a liability and how can it be made an asset?', '', '', '', '', '', ''),
(216, '9', '5', '8', '4', 'How does education play as an important input for human capital formation?', '', '', '', '', '', ''),
(217, '9', '5', '8', '4', 'What are the benefits of vocational education at school level?', '', '', '', '', '', ''),
(218, '9', '5', '8', '4', 'Has the literacy rates of popu1ion increased since 1951?', '', '', '', '', '', ''),
(219, '9', '5', '8', '4', 'Why literacy rate is high among the males of India?', '', '', '', '', '', ''),
(220, '9', '5', '8', '4', 'What do you know about \"\"Sarva Siksha Abhiyan\"\"?', '', '', '', '', '', ''),
(221, '9', '5', '8', '4', 'What is the aim of Sarva Shiksha Abhiyan?', '', '', '', '', '', ''),
(222, '9', '5', '8', '4', 'Why was mid-day meal scheme launched by the government in the schools?', '', '', '', '', '', ''),
(223, '9', '5', '8', '4', 'What is the strategy of eleventh plan for education and literacy?', '', '', '', '', '', ''),
(224, '9', '5', '8', '4', 'What is the result of this eleventh plan?', '', '', '', '', '', ''),
(225, '9', '5', '8', '4', 'What is the benefit of good health?', '', '', '', '', '', ''),
(226, '9', '5', '8', '4', 'What is the national policy of India for health?', '', '', '', '', '', ''),
(227, '9', '5', '8', '4', 'What is the 3tus of unemployment\'?', '', '', '', '', '', ''),
(228, '9', '5', '8', '4', 'What kind of unemployments exists in rural and urban areas?', '', '', '', '', '', ''),
(229, '9', '5', '8', '4', 'When does seasonal unemployment take place?', '', '', '', '', '', ''),
(230, '9', '5', '8', '4', 'What happens in disguised unemployment?', '', '', '', '', '', ''),
(231, '9', '5', '8', '4', 'Who are educated unemployed?', '', '', '', '', '', ''),
(232, '9', '5', '8', '4', 'What is the result of unemployment in a country?', '', '', '', '', '', ''),
(234, '9', '5', '8', '4', 'Surplus labour in agriculture has moved to which jobs in secondary a tertiary sector?', '', '', '', '', '', ''),
(235, '9', '5', '8', '4', 'Which capital would you consider the best-land, labours, physical capital or human capital?', '', '', '', '', '', ''),
(236, '9', '5', '8', '3', 'What do you under3nd by \'people as resource\'?', '', '', '', '', '', ''),
(237, '9', '5', '8', '3', 'How is human resource different from other resources like land and physical capital?', '', '', '', '', '', ''),
(238, '9', '5', '8', '3', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(239, '9', '5', '8', '3', 'What is the role of health in human capital formation?', '', '', '', '', '', ''),
(240, '9', '5', '8', '3', 'Is it true that educated parents invest more heavily on their children\'s education and why?', '', '', '', '', '', ''),
(241, '9', '5', '8', '3', 'How did countries like Japan become rich?', '', '', '', '', '', ''),
(242, '9', '5', '8', '3', 'What is the role of health in the working life of an individual?', '', '', '', '', '', ''),
(243, '9', '5', '8', '3', 'Classify various activities into primary, secondary and tertiary sectors.', '', '', '', '', '', ''),
(244, '9', '5', '8', '3', 'What are the differences between Market and Non-market activities?', '', '', '', '', '', ''),
(245, '9', '5', '8', '3', 'Why are most women employed in low-paid work?', '', '', '', '', '', ''),
(246, '9', '5', '8', '3', 'How do educated women earn at par with their male counterparts?', '', '', '', '', '', ''),
(247, '9', '5', '8', '3', 'On what factors does the quality of popu1ion depend on?', '', '', '', '', '', ''),
(248, '9', '5', '8', '3', 'What is India\'s national policy for health?', '', '', '', '', '', ''),
(249, '9', '5', '8', '3', 'Explain the term unemployment in the context of India.', '', '', '', '', '', ''),
(250, '9', '5', '8', '3', 'Why is educated unemployment a peculiar problem in India?', '', '', '', '', '', ''),
(251, '9', '5', '8', '3', 'Why are people of a country referred as resource?', '', '', '', '', '', ''),
(252, '9', '5', '8', '3', 'How does investment in human capital yield a return just like inve3eriin physical capital?', '', '', '', '', '', ''),
(253, '9', '5', '8', '3', 'Is large popu1ion considered a liability rather than an asset?', '', '', '', '', '', ''),
(254, '9', '5', '8', '3', 'What is the present employment scenario in the three sectors?', '', '', '', '', '', ''),
(255, '9', '5', '8', '1', 'What do you know about Sarva Shiksha Abhiyan?', '', '', '', '', '', ''),
(256, '9', '5', '8', '1', 'How does seasonal unemployment occur?', '', '', '', '', '', ''),
(257, '9', '5', '8', '1', 'Do you think that people appear employed in disguise unemployment?', '', '', '', '', '', ''),
(258, '9', '5', '8', '1', 'What is the impact of unemployment?', '', '', '', '', '', ''),
(259, '9', '5', '8', '1', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(260, '9', '5', '8', '1', 'Why are women employed in low-paid work?', '', '', '', '', '', ''),
(261, '9', '5', '8', '1', 'What was the Tenth Plan endeavour to increase the enrolment in higher education?', '', '', '', '', '', ''),
(262, '9', '5', '8', '1', 'What does unemployment mean? What types of unemployment do we have in rural areas?', '', '', '', '', '', ''),
(263, '9', '5', '8', '1', 'What kind of unemployment exists in urban areas?', '', '', '', '', '', ''),
(264, '9', '5', '8', '1', 'How can you prove 3tistically that the unemployment rate is low in India?', '', '', '', '', '', ''),
(265, '9', '5', '8', '1', 'The employment structure is characterised by self-employment in primary sector. Explain.', '', '', '', '', '', ''),
(266, '9', '5', '8', '1', 'Can you suggest some measures in the education system to mitigate the problem of the educated unemployed?', '', '', '', '', '', ''),
(267, '9', '5', '8', '1', 'Describe the policy of government in the field of education.', '', '', '', '', '', ''),
(268, '9', '5', '8', '5', 'For better economic growth, which investments in human resources should be done, either in modern technology, in healthcare and education, in food and drink or in transportation?', '', '', '', '', '', ''),
(269, '9', '5', '8', '5', 'Construction is an activity of which sector?', '', '', '', '', '', ''),
(270, '9', '5', '8', '5', 'Sprinkling crops with insecticide is an activity of which sector?', '', '', '', '', '', ''),
(271, '9', '5', '8', '5', 'Navodaya Vidyalayas have been 3rted for which kind of school children?', '', '', '', '', '', ''),
(272, '9', '5', '8', '5', 'Sarva Shiksha Abhiyan is meant to provide what kind of education?', '', '', '', '', '', ''),
(273, '9', '5', '8', '5', 'What is the age group of popu1ion which is treated as the workforce?', '', '', '', '', '', ''),
(274, '9', '5', '8', '5', 'Unemployment wastes what resources?', '', '', '', '', '', ''),
(275, '9', '5', '8', '5', 'In which category of activity will you place a social worker educating poor children for free?', '', '', '', '', '', ''),
(276, '9', '5', '8', '5', 'Why do educated parents invest more in their children\'s education and health?', '', '', '', '', '', ''),
(277, '9', '5', '8', '5', 'Is it correct that disguised unemployment is very common in urban areas?', '', '', '', '', '', ''),
(278, '9', '5', '8', '5', 'Why are rural women employed at very low wages?', '', '', '', '', '', ''),
(279, '9', '5', '8', '5', 'When we refer to a woman as a \'resource\', we are referring to which of her skills?', '', '', '', '', '', ''),
(280, '9', '5', '8', '5', 'Begging is which category of activity?', '', '', '', '', '', ''),
(281, '9', '5', '8', '5', 'In which area of India is the literacy rate the lowest?', '', '', '', '', '', ''),
(282, '9', '5', '8', '5', 'Which sector of the Indian economy absorbs the maximum labour?', '', '', '', '', '', ''),
(283, '9', '5', '8', '5', 'Can finished goods produced by an industry be treated as f9ed capital?', '', '', '', '', '', ''),
(284, '9', '5', '8', '5', 'How will you define the life expectancy of a new born baby?', '', '', '', '', '', ''),
(285, '9', '5', '8', '5', 'What is the major reason for education having an important role in human capital formation?', '', '', '', '', '', ''),
(286, '9', '5', '8', '5', 'Is it true that the literacy rate of a popu1ion is the popu1ion multiplied by 100 divided by the number of literate people?', '', '', '', '', '', ''),
(287, '9', '5', '8', '5', 'Is drinking tea from a tea 3ll in the market a non-economic activity?', '', '', '', '', '', ''),
(288, '9', '5', '8', '5', 'Which person out of a farm labourer, a construction worker and a miner is having seasonal employment?', '', '', '', '', '', ''),
(289, '9', '5', '8', '5', 'What is the meaning of vocational education?', '', '', '', '', '', ''),
(290, '9', '5', '8', '5', 'What do you under3nd by the term human resource?', '', '', '', '', '', ''),
(291, '9', '5', '8', '5', 'What is human capital?', '', '', '', '', '', ''),
(292, '9', '5', '8', '5', 'A person is making envelops with the help of papers. In which sector should his activity be included?', '', '', '', '', '', ''),
(293, '9', '5', '8', '5', 'Which 3te in India has highest literacy rate?', '', '', '', '', '', ''),
(294, '9', '5', '8', '5', 'What do you under3nd by the term Sarva Shiksha Abhiyan?', '', '', '', '', '', ''),
(295, '9', '5', '8', '5', 'What is the name of the school set in each district by the government for talented students of rural area?', '', '', '', '', '', ''),
(296, '9', '5', '8', '5', 'Which is the most labour absorbing sector of economy?', '', '', '', '', '', ''),
(297, '9', '5', '8', '5', 'Name the two type of unemployment exist in rural India.', '', '', '', '', '', ''),
(298, '9', '5', '8', '5', 'Name the phenomenon of shifting of labourers from rural area to urban area in search of work.', '', '', '', '', '', ''),
(299, '9', '5', '8', '5', 'What is the full form of GNP?', '', '', '', '', '', ''),
(300, '9', '5', '8', '5', 'What is the current literacy rate of India according to Census of 2011 ? ', '', '', '', '', '', ''),
(301, '9', '5', '8', '5', 'Why is human capital the most important factor of production? Give three reasons.', '', '', '', '', '', ''),
(302, '9', '5', '8', '5', 'What are various activities which are classified into the three main sectors? Name each sector with suitable examples.', '', '', '', '', '', ''),
(303, '9', '5', '8', '5', 'What is the difference between economic activities and non-economic activities?', '', '', '', '', '', ''),
(304, '9', '5', '8', '5', 'What role does education play towards growth of society?', '', '', '', '', '', ''),
(305, '9', '5', '8', '5', 'Why does unemployment have a detrimental effect on the overall growth of an economy?', '', '', '', '', '', ''),
(306, '9', '5', '8', '5', 'Explain why Infant Mortality Rate (IMR) and literacy rate are considered to be indicators of human resource development.', '', '', '', '', '', ''),
(307, '9', '5', '8', '5', 'Do you notice any difference between the two friends Vilas and Sakal? What are those?', '', '', '', '', '', ''),
(308, '9', '5', '8', '5', 'Visit a nearby village or a slum area and write down a case study of a boy or girl of your age facing the same condition as Vilas or Sakal.', '', '', '', '', '', ''),
(309, '9', '5', '8', '5', 'Based on the picture can you classify these activities into three sectors??', '', '', '', '', '', ''),
(310, '9', '5', '8', '5', 'Say whether these activities are economic or non-economic activities. Vilas sells fish in the village market. (b) Vilas cooks food for his family. (Sakal works in the private firm. (d) Sakal looks after his younger brother and sister.', '', '', '', '', '', ''),
(311, '9', '5', '8', '5', 'What is the role of health in human capital formation?', '', '', '', '', '', ''),
(312, '9', '5', '8', '5', 'In which field do you think India can build the maximum employment opportunity?', '', '', '', '', '', ''),
(313, '9', '5', '8', '5', 'Can you suggest some measures in the education system to mitigate the problem of the educated-unemployed?', '', '', '', '', '', ''),
(314, '9', '5', '8', '5', 'Can you imagine some village which initially had no job opportunities but 1er came up with many?', '', '', '', '', '', ''),
(315, '9', '5', '8', '5', 'Which capital would you consider the best - land, labour, physical capital and human capital? Why?', '', '', '', '', '', ''),
(316, '9', '5', '8', '5', 'Why is human resource considered to be the best resource ? Explain. Or Why is human resource superior to any other resource? Explain with the help of three arguments.', '', '', '', '', '', ''),
(317, '9', '5', '8', '5', 'Why do educated parents invest more heavily on their children\'s education? Give three reasons.', '', '', '', '', '', ''),
(318, '9', '5', '8', '5', 'What is meant by \'People as Resource\'? Explain how is human resource different from other resources like land and physical capitals?', '', '', '', '', '', ''),
(319, '9', '5', '8', '5', 'What is meant by economic activities and how are these classified? Give one example of each. Or Distinguish between market and non-market activities with three points of distinction, Or What are the two type of economic activity? 3te two characteristics of each.', '', '', '', '', '', ''),
(320, '9', '5', '8', '5', 'Describe any three steps taken by government in the field of education.', '', '', '', '', '', ''),
(321, '9', '5', '8', '5', 'Mention any three features of National health policy.', '', '', '', '', '', ''),
(322, '9', '5', '8', '5', 'On what factors do the quality of popu1ion depend? How does the education enhances the quality of popu1ion? Explain. Or Analyse the role of education in the formations of human capital. Or How can education contribute toward the growth of society? Explain in three points.', '', '', '', '', '', ''),
(323, '9', '5', '8', '5', 'Explain in three points the role of health in human capital formation. Or Why has the improvement in health 3tus of popu1ion has been the basic priority of a country? Given three reasons. Or \"\"Health is the priority of the country\"\". Justify the 3tement giving five arguments.', '', '', '', '', '', ''),
(324, '9', '5', '8', '5', 'Explain any three demerits of unemployment. Or \"\"Unemployment leads to a depressed economy\". Justify the 3tement with five arguments. Or \"Increase in unemployment is an indicator of a depressed economy\"\". Do you agree with this 3tement. Support your answer by giving arguments. ?', '', '', '', '', '', ''),
(325, '9', '5', '8', '5', 'the four requirements for the production of goods and services. What are the items that come under physical capital ?', '', '', '', '', '', ''),
(326, '9', '5', '8', '5', 'What are the two types of unemployment found in rural areas? How does unemployment affect the overall growth of an economy? Explain by giving four points.', '', '', '', '', '', ''),
(327, '9', '5', '8', '5', 'Why are women employed in low paid work?', '', '', '', '', '', ''),
(328, '9', '5', '8', '5', 'Why is educated unemployment, a peculiar problem of India ?', '', '', '', '', '', ''),
(329, '9', '5', '8', '5', 'What are the objectives of India\'s national policy on health? Suggest two ways in which the policy objectives can be met.', '', '', '', '', '', ''),
(330, '9', '5', '8', '5', 'What is the mid-day meal scheme? Explain its purpose.', '', '', '', '', '', ''),
(331, '9', '5', '8', '5', 'Study the graph and answer the following questions.??(a) Has the literacy rates of the popu1ion increased since 1951 ? (b) In which year, India has the highest literacy rates? (Why literacy rate is high among the males of India? (d) Why are women less educated than men? (e) How would you calcu1e literacy rate in India?  8. Table: Health Infrastructure over the years(SC : Sub Centre PHC: Primary Health Centre CHC: Community Health Centre Study the above table and answer the following questions. What is the percentage increase in dispensaries from 1951 to 2001 ? (b) What is the percentage increase in doctors and nursing personnel from 1951 to 2001? (Do you think the increase in the number of doctors and nurses is adequate for India? If not, why? (d) What other facilities would you like to provide in a hospital? (e) Discuss about the hospital you have visited.)', '', '', '', '', '', ''),
(332, '9', '5', '8', '5', 'What is the difference between disguised unemployment and seasonal unemployment?', '', '', '', '', '', ''),
(333, '9', '5', '8', '5', '\"\"Sakal was meritorious and interested in studies from the beginning.... .After sometime he got a job in a private firm..... His boss acknowledged his services and rewarded him with a promotion.\" \"Vilas\'s father Mahesh was a fisherman, who passed away when he was only two years old. His mother Geeta sold fish to earn money to feed the family. She could earn only Rs. 20 to 30 a day by selling fish. Vilas......was not interested in studies. He helped his mother in cooking and also looked after his younger brother Mohan. After his mother died, Vilas, too, was forced to sell fish in the same village. He, like his mother, earned only a meagre income.\" Sakal and Vilas are friends. What has Vilas not got which Sakal had? Is it possible for Vilas to improve his financial position now? If so how? Explain in about 120 words.', '', '', '', '', '', ''),
(334, '9', '5', '8', '5', '\"\"The health of a person helps him to realize his potential and the ability to fight illness. An unhealthy person becomes a liability for an organisation .....\"\". Many private companies and the government have elaborate healthcare benefits including group insurance for their permanent employees. However, no such schemes are made available to the temporary or contractual employees. Do you think that this practice by government and private companies is justified? If so, why ? If not, how can this matter be rectified without loss to the government/private company or to the temporary/ contractual employee?', '', '', '', '', '', ''),
(335, '9', '5', '8', '5', 'How can large popu1ion be turned in a productive asset? Explain. Or Explain the importance of people as a resource. Or What is meant by people as a resource? Explain.', '', '', '', '', '', ''),
(336, '9', '5', '8', '5', '\"\"Human resources is an indispensable factor of production\"\". Justify.', '', '', '', '', '', ''),
(337, '9', '5', '8', '5', 'How are children of educated parents different from those of uneducated parents? Give three points of difference.', '', '', '', '', '', ''),
(338, '9', '5', '8', '5', 'Why did Japan emerge as a developed country in spite of its poor natural resources? Why is Japan a developed and rich country in spite of lacking in natural resources? Or Despite insufficient availability of natural resources, Japan has emerged as a rich and developed nation. Justify the 3tement with three significant factors responsible for making Japan rich.', '', '', '', '', '', ''),
(339, '9', '5', '8', '5', 'List three non-economic activities.', '', '', '', '', '', ''),
(340, '9', '5', '8', '5', 'The quality of a popu1ion depends on which factors?', '', '', '', '', '', ''),
(341, '9', '5', '8', '5', 'What was the purpose of Sarva Shiksha Abhiyan? What are its goals?', '', '', '', '', '', ''),
(342, '9', '5', '8', '5', 'What do you mean by people as resource?', '', '', '', '', '', ''),
(343, '9', '5', '8', '5', 'Distinguish between physical and human capital.', '', '', '', '', '', ''),
(344, '9', '5', '8', '5', 'What do you under3nd by \'people as a resource\'?', '', '', '', '', '', ''),
(345, '9', '5', '8', '5', 'How is human resource different from other resources like land and physical capital?', '', '', '', '', '', ''),
(346, '9', '5', '8', '5', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(347, '9', '5', '8', '5', 'What part does health play in the individual\'s working life?', '', '', '', '', '', ''),
(348, '9', '5', '8', '5', 'What are the various activities undertaken in the Primary sector, Secondary sector and Tertiary sector?', '', '', '', '', '', ''),
(349, '9', '5', '8', '5', 'How will you explain the term unemployment?', '', '', '', '', '', ''),
(350, '9', '5', '8', '5', 'How does Popu1ion become human capital?', '', '', '', '', '', ''),
(351, '9', '5', '8', '5', 'What does \'People as a Resource\' mean?', '', '', '', '', '', ''),
(352, '9', '5', '8', '5', 'What is \'human capital formation\'?', '', '', '', '', '', ''),
(353, '9', '5', '8', '5', 'How can investment be made in human capital?', '', '', '', '', '', ''),
(354, '9', '5', '8', '5', 'How is human capital superior to other resources?', '', '', '', '', '', ''),
(355, '9', '5', '8', '5', 'How can a large popu1ion of India be turned as an asset rather than a liability?', '', '', '', '', '', ''),
(356, '9', '5', '8', '5', 'What kind of investment can be made on a child?', '', '', '', '', '', ''),
(357, '9', '5', '8', '5', 'How a vicious cycle is created by illiterate parents for their children?', '', '', '', '', '', ''),
(358, '9', '5', '8', '5', 'Why educated parents invest heavily on the education of their children?', '', '', '', '', '', ''),
(359, '9', '5', '8', '5', 'How have countries like Japan become rich and developed?', '', '', '', '', '', ''),
(360, '9', '5', '8', '5', 'Classify various activities on the basis of its economic benefit?', '', '', '', '', '', ''),
(361, '9', '5', '8', '5', 'What are Primary Activities?', '', '', '', '', '', ''),
(362, '9', '5', '8', '5', 'Which activities are included in Secondary sector?', '', '', '', '', '', ''),
(363, '9', '5', '8', '5', 'What are Tertiary Activities?', '', '', '', '', '', ''),
(364, '9', '5', '8', '5', 'What are economic activities?', '', '', '', '', '', ''),
(365, '9', '5', '8', '5', 'What are Market Activities?', '', '', '', '', '', ''),
(366, '9', '5', '8', '5', 'What are Non-Market Activities?', '', '', '', '', '', ''),
(367, '9', '5', '8', '5', 'How is division of labours made between men and women in the family?', '', '', '', '', '', ''),
(368, '9', '5', '8', '5', 'Is women\'s work an economic activity?', '', '', '', '', '', ''),
(369, '9', '5', '8', '5', 'What are the major determinants of earnings?', '', '', '', '', '', ''),
(370, '9', '5', '8', '5', 'What are unorganised sectors?', '', '', '', '', '', ''),
(371, '9', '5', '8', '5', 'What kinds of jobs, attract women in organised sector?', '', '', '', '', '', ''),
(372, '9', '5', '8', '5', 'In which other sectors have women with high education and skill entered?', '', '', '', '', '', ''),
(373, '9', '5', '8', '5', 'On what factors the quality of popu1ion depends?', '', '', '', '', '', ''),
(374, '9', '5', '8', '5', 'How can popu1ion be a liability and how can it be made an asset?', '', '', '', '', '', ''),
(375, '9', '5', '8', '5', 'How does education play as an important input for human capital formation?', '', '', '', '', '', ''),
(376, '9', '5', '8', '5', 'What are the benefits of vocational education at school level?', '', '', '', '', '', ''),
(377, '9', '5', '8', '5', 'Has the literacy rates of popu1ion increased since 1951?', '', '', '', '', '', ''),
(378, '9', '5', '8', '5', 'Why literacy rate is high among the males of India?', '', '', '', '', '', ''),
(379, '9', '5', '8', '5', 'What do you know about \"\"Sarva Siksha Abhiyan\"\"?', '', '', '', '', '', ''),
(380, '9', '5', '8', '5', 'What is the aim of Sarva Shiksha Abhiyan?', '', '', '', '', '', ''),
(381, '9', '5', '8', '5', 'Why was mid-day meal scheme launched by the government in the schools?', '', '', '', '', '', ''),
(382, '9', '5', '8', '5', 'What is the strategy of eleventh plan for education and literacy?', '', '', '', '', '', ''),
(383, '9', '5', '8', '5', 'What is the result of this eleventh plan?', '', '', '', '', '', ''),
(384, '9', '5', '8', '5', 'What is the benefit of good health?', '', '', '', '', '', ''),
(385, '9', '5', '8', '5', 'What is the national policy of India for health?', '', '', '', '', '', ''),
(386, '9', '5', '8', '5', 'What is the 3tus of \'unemployment\'?', '', '', '', '', '', ''),
(387, '9', '5', '8', '5', 'What kind of unemployments exists in rural and urban areas?', '', '', '', '', '', ''),
(388, '9', '5', '8', '5', 'When does seasonal unemployment take place?', '', '', '', '', '', ''),
(389, '9', '5', '8', '5', 'What happens in disguised unemployment?', '', '', '', '', '', ''),
(390, '9', '5', '8', '5', 'Who are educated unemployed?', '', '', '', '', '', ''),
(391, '9', '5', '8', '5', 'What is the result of unemployment in a country?', '', '', '', '', '', ''),
(392, '9', '5', '8', '5', 'How unemployment has detrimental impact on the overall growth of an economy?', '', '', '', '', '', ''),
(393, '9', '5', '8', '5', 'Surplus labour in agriculture has moved to which jobs in secondary and tertiary sector?', '', '', '', '', '', ''),
(394, '9', '5', '8', '5', 'Which capital would you consider the best-land, labours, physical capital or human capital? ?', '', '', '', '', '', '');
INSERT INTO `questionbank` (`qId`, `classId`, `subjectId`, `topicId`, `typeId`, `question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Option_5`, `Option_6`) VALUES
(395, '9', '5', '8', '5', 'What do you under3nd by \'people as resource\'?', '', '', '', '', '', ''),
(396, '9', '5', '8', '5', 'How is human resource different from other resources like land and physical capital?', '', '', '', '', '', ''),
(397, '9', '5', '8', '5', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(398, '9', '5', '8', '5', 'What is the role of health in human capital formation?', '', '', '', '', '', ''),
(399, '9', '5', '8', '5', 'Is it true that educated parents invest more heavily on their children\'s education and why?', '', '', '', '', '', ''),
(400, '9', '5', '8', '5', 'How did countries like Japan become rich?', '', '', '', '', '', ''),
(401, '9', '5', '8', '5', 'What is the role of health in the working life of an individual?', '', '', '', '', '', ''),
(402, '9', '5', '8', '5', 'Classify various activities into primary, secondary and tertiary sectors.', '', '', '', '', '', ''),
(403, '9', '5', '8', '5', 'What are the differences between Market and Non-market activities?', '', '', '', '', '', ''),
(404, '9', '5', '8', '5', 'How do educated women earn at par with their male counterparts?', '', '', '', '', '', ''),
(405, '9', '5', '8', '5', 'On what factors does the quality of popu1ion depend on?', '', '', '', '', '', ''),
(406, '9', '5', '8', '5', 'What is India\'s national policy for health?', '', '', '', '', '', ''),
(407, '9', '5', '8', '5', 'Explain the term \'unemployment\' in the context of India.', '', '', '', '', '', ''),
(408, '9', '5', '8', '5', 'Why is educated unemployment a peculiar problem in India?', '', '', '', '', '', ''),
(409, '9', '5', '8', '5', 'Why are people of a country referred as resource?', '', '', '', '', '', ''),
(410, '9', '5', '8', '5', 'How does investment in human capital yield a return just like investment in physical capital?', '', '', '', '', '', ''),
(411, '9', '5', '8', '5', 'Is large popu1ion considered a liability rather than an asset?', '', '', '', '', '', ''),
(412, '9', '5', '8', '5', 'What is the present employment scenario in the three sectors? ', '', '', '', '', '', ''),
(413, '9', '5', '8', '5', 'What do you know about \'Sarva Shiksha Abhiyan\'?', '', '', '', '', '', ''),
(414, '9', '5', '8', '5', 'How does seasonal unemployment occur?', '', '', '', '', '', ''),
(415, '9', '5', '8', '5', 'Do you think that people appear employed in disguised unemployment?', '', '', '', '', '', ''),
(416, '9', '5', '8', '5', 'What is the impact of unemployment?', '', '', '', '', '', ''),
(417, '9', '5', '8', '5', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(418, '9', '5', '8', '5', 'Why are women employed in low-paid work?', '', '', '', '', '', ''),
(419, '9', '5', '8', '5', 'What was the Tenth Plan endeavour to increase the enrolment in higher education?', '', '', '', '', '', ''),
(420, '9', '5', '8', '5', 'What does unemployment mean? What types of unemployment do we have in rural areas?', '', '', '', '', '', ''),
(421, '9', '5', '8', '5', 'What kind of unemployment exists in urban areas?', '', '', '', '', '', ''),
(422, '9', '5', '8', '5', 'How can you prove 3tistically that the unemployment rate is low in India?', '', '', '', '', '', ''),
(423, '9', '5', '8', '5', '\"\"The employment structure is characterised by self-employment in primary sector.\"\" Explain', '', '', '', '', '', ''),
(424, '9', '5', '8', '5', 'Can you suggest some measures in the education system to mitigate the problem of the educated unemployed?', '', '', '', '', '', ''),
(425, '9', '5', '8', '5', 'Describe the policy of government in the field of education. ', '', '', '', '', '', ''),
(426, '9', '5', '8', '5', 'The full form of GNP is: ', 'Gross National Product ', 'Green Nation People ', 'Green National Project ', 'Gross National Performance', '', ''),
(427, '9', '5', '8', '5', 'Quarrying and manufacturing is included in the: ', 'Primary sector ', 'Secondary sector ', 'Tertiary sector ', 'Government sector', '', ''),
(428, '9', '5', '8', '5', 'An activity performed for profit or for services provided can be termed as: ', 'Market activity ', 'Professional activity ', 'Non-market activity ', 'Formal activity', '', ''),
(429, '9', '5', '8', '5', '\'Sarva Shiksha Abhiyan\' is a significant step towards providing education to all children in the age group: ', '6-14 years ', '5-10 years ', '5-14 years ', '10-15 years', '', ''),
(430, '9', '5', '8', '5', 'When people appear to be employed, this kind of unemployment is called: ', 'Seasonal unemployment ', 'Educated unemployment ', 'Disguised unemployment ', 'All of the above', '', ''),
(431, '9', '5', '8', '5', 'Which one of these is the most labour absorbing sector of the economy? ', 'Industries ', 'Agriculture ', 'Transportation ', 'Service ? ', '', ''),
(432, '9', '5', '8', '5', 'What does \'human capital\' 3nd for?', '', '', '', '', '', ''),
(433, '9', '5', '8', '5', 'How is human resource different from other resources like land and physical capital?', '', '', '', '', '', ''),
(434, '9', '5', '8', '5', 'What is the role of education in human capital formation?', '', '', '', '', '', ''),
(435, '9', '5', '8', '5', 'Why women are paid less when they are illiterate and not skilled in comparison to educated and skilled ones?', '', '', '', '', '', ''),
(436, '9', '5', '8', '5', 'What does quality of popu1ion imply?', '', '', '', '', '', ''),
(437, '9', '5', '8', '5', '\'Health is wealth\', is it true? Describe the role played by health in the individual\'s working life. ?', '', '', '', '', '', ''),
(438, '1', '2', '9', '2', 'Identity the odd one out', 'Green', 'Red', 'Colour', 'Orange', 'None of these', ''),
(439, '1', '2', '9', '2', 'Identity the odd one out', 'Venus', 'Mars', 'Pluto', 'Neptune', 'None of these', ''),
(440, '1', '2', '9', '2', 'Identity the odd one out', 'Happy', 'Gloomy', 'Lively', 'Cheerful', 'None of these', ''),
(441, '1', '2', '9', '2', 'Identity the odd one out', 'Cub', 'Chicken', 'Pig', 'Pup', 'None of these', ''),
(442, '1', '2', '9', '2', 'Identity the odd one out', 'Knee', 'Foot', 'Ankle', 'Palm', 'None of these', ''),
(443, '1', '2', '9', '2', 'Identity the odd one out', 'Immortal', 'Eminent', 'Perpetual', 'Everlasting', 'None of these', ''),
(444, '1', '2', '9', '2', 'Identity the odd one out', 'Mathematics', 'Algebra', 'Trigonometry', 'Geometry', 'None of these', ''),
(445, '1', '2', '9', '2', 'Identity the odd one out', 'Adore', 'Like', 'Love', 'Laugh', 'None of these', ''),
(446, '1', '2', '9', '2', 'Identity the odd one out', 'Club', 'Heart', 'Spade', 'Ace', 'None of these', ''),
(447, '1', '2', '9', '2', 'Identity the odd one out', 'Dismay', 'Dread', 'Downer', 'Delight', 'None of these', ''),
(448, '1', '2', '9', '2', 'Identity the odd one out', 'Rose', 'Pink', 'Red', 'Maroon', 'None of these', ''),
(449, '1', '2', '9', '2', 'Identity the odd one out', 'Mature', 'Youthful', 'Ripen', 'Mellow', 'None of these', ''),
(450, '1', '2', '9', '2', 'Identity the odd one out', 'Claver', 'Wise', 'Doubly', 'Foolish', 'None of these', ''),
(451, '1', '2', '9', '2', 'Identity the odd one out', 'Sword', 'Spear', 'Shield', 'Arrow', 'None of these', ''),
(452, '1', '2', '9', '2', 'Identity the odd one out', 'What', 'Which', 'Who', 'Whoever', 'None of these', ''),
(453, '1', '2', '9', '2', 'Identity the odd one out', 'Witch', 'Hind', 'Ewe', 'Stag', 'None of these', ''),
(454, '1', '2', '9', '2', 'Identity the odd one out', 'Best', 'Upper', 'Worst', 'Least', 'None of these', ''),
(455, '1', '2', '9', '2', 'Identity the odd one out', 'Have', 'Do', 'Can', 'Am', 'None of these', ''),
(456, '1', '2', '9', '2', 'Identity the odd one out', 'In', 'Or', 'Of', 'Off', 'None of these', ''),
(457, '1', '2', '9', '2', 'Identity the odd one out', 'But', 'Still', 'Only', 'Else', 'None of these', ''),
(458, '1', '2', '9', '2', 'Identity the odd one out', 'Nest', 'Shed', 'Stable', 'Kennel', 'None of these', ''),
(459, '1', '2', '9', '2', 'Identity the odd one out', 'Sad', 'Cheerful', 'Jovial', 'Festive', 'None of these', ''),
(460, '1', '2', '9', '2', 'Identity the odd one out', 'Helicopter', 'Steamer', 'Chariot', 'Automobile', 'None of these', ''),
(461, '1', '2', '9', '2', 'Identity the odd one out', 'Long jump', 'Athletics', 'High jump', 'Running', 'None of these', ''),
(462, '1', '2', '9', '2', 'Identity the odd one out', 'English', 'Biology', 'Mathematics', 'Physics', 'None of these', ''),
(463, '1', '2', '9', '2', 'Identity the odd one out', 'Magazine', 'Novel', 'Book', 'Dictionary', 'None of these', ''),
(464, '1', '2', '9', '2', 'Identity the odd one out', 'Day', 'Week', 'Fortnight', 'Calendar', 'None of these', ''),
(465, '1', '2', '9', '2', 'Identity the odd one out', 'Plumber', 'Tailor', 'Sailor', 'Carpenter', 'None of these', ''),
(466, '1', '2', '9', '2', 'Identity the odd one out', 'Square', 'Area', 'Triangle', 'Circle', 'None of these', ''),
(467, '1', '2', '9', '2', 'Identity the odd one out', 'Paper', 'Foot ruler', 'Sharpener', 'Teacher', 'None of these', ''),
(468, '1', '2', '9', '2', 'Identity the odd one out', 'Bench', 'Sofa', 'Cupboard', 'Chair', 'None of these', ''),
(469, '1', '2', '9', '2', 'Identity the odd one out', 'Chisel', 'Tools', 'Hammer', 'Axe', 'None of these', ''),
(470, '1', '2', '9', '2', 'Identity the odd one out', 'Tree', 'Root', 'Flower', 'Leaf', 'None of these', ''),
(471, '1', '2', '9', '2', 'Identity the odd one out', 'Climber', 'Plant', 'Shrub', 'Creeper', 'None of these', ''),
(472, '1', '2', '9', '2', 'Identity the odd one out', 'Calcutta', 'Chennai', 'Bengaluru', 'Mumbai', 'None of these', ''),
(473, '1', '2', '9', '2', 'Identity the odd one out', 'Hut', 'Bungalow', 'Cottage', 'Apartments', 'None of these', ''),
(474, '1', '2', '9', '2', 'Identity the odd one out', 'Guava', 'Cauliflower', 'Malta', 'Coconut', 'None of these', ''),
(475, '1', '2', '9', '2', 'Identity the odd one out', 'Gallon', 'Ton', 'Quintal', 'Kilogram', 'None of these', ''),
(476, '1', '2', '9', '2', 'Identity the odd one out', 'Opening', 'Yawn', 'Junction', 'Cleft', 'None of these', ''),
(477, '1', '2', '9', '2', 'Identity the odd one out', 'Snooker', 'Badminton', 'Squash', 'Volleyball', 'None of these', ''),
(478, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The people who work in this company are all trained people.', 'staff of this company', 'team of this company', 'organisation of this company', 'crew of this company', '', ''),
(479, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The plane got crashed because the people who flew the plane did not know each other\'s language and lacked co-ordination.', 'the gang', 'the crew', 'the squad', 'the corps', '', ''),
(480, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The people who acted in the film were all members of a single family.', 'characters of the film', 'guys of the film', 'actors of the film', 'fellows of the film', '', ''),
(481, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The people in general are fickle.', 'public', 'individuals', 'humans', 'mortals', '', ''),
(482, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: Charmed by the tunes of his flute, a number of cows gathered around Krishna.', 'herd of cows', 'bunch of cows', 'set of cows', 'pack of cows', '', ''),
(483, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: A number of tools were required to open the engine.', 'set of tools', 'pile of tools', 'store of tools', 'hoard of tools', '', ''),
(484, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: We had to cross a number of houses in order to reach the shopping complex.', 'row of houses', 'string of houses', 'line of houses', 'file of houses', '', ''),
(485, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The clerk was found sleeping behind a big heap of papers.', 'mound of papers', 'stack of papers', 'hillock of papers', 'heap of papers', '', ''),
(486, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: I bought six glasses of the same kind for the evening party.', 'a set of six glasses', 'a pair of six glasses', 'a couple of six glasses', 'a team of six glasses', '', ''),
(487, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: Anne had to face a great deal of allegations but they were all proved false.', 'thread of allegations', 'string of allegations', 'rope of allegations', 'sequence of allegations', '', ''),
(488, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: The maid-servent scowled to see a lot of dirty clothes.', 'collection of dirty clothes', 'camp of dirty clothes', 'group of dirty clothes', 'class of dirty clothes', '', ''),
(489, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: Many police officers are looking into the matter.', 'team of officers', 'A band of officers', 'gang of officers', 'A pack of officers', '', ''),
(490, '8', '2', '10', '7', 'Replace the following underlined phrases with appropriate collective nouns: I was thrilled to get a lot of pearls strung together', 'line of pearls', 'necklace of pearls', 'row of pearls', 'queue of pearls', '', ''),
(491, '8', '2', '10', '7', 'Change the verb given in the bracket to suitable noun: What was his ______(react) to your decision to quit studies?', 'reacting', 'reaction', 'react', 'none of these', '', ''),
(492, '8', '2', '10', '7', 'Change the verb given in the bracket to suitable noun: I have no ______ (object) to your going for a movie, but the time is a concern.', 'object', 'objecting', 'objection', 'none of these', '', ''),
(493, '8', '2', '10', '7', 'Change the verb given in the bracket to suitable noun: You need a lot of _____ (concentrate) when you are studying.', 'concentration', 'concentrating', 'concentrate', 'none of these', '', ''),
(494, '8', '2', '10', '7', 'Complete the following sentences with commonly used nouns: On a family holiday, my wife just loves going window ______.', 'smashing', 'shopping', 'cleaning', 'gazing', '', ''),
(495, '8', '2', '10', '7', 'Complete the following sentences with commonly used nouns: The little child would have drowned but for the lifeguard who came in at the ___ of time.', 'ring', 'right', 'nick', 'none of these', '', ''),
(496, '8', '2', '10', '7', 'Complete the following sentences with commonly used nouns: He was ____ on time. He is always very punctual.', 'spot', 'well', 'exact', 'none of these', '', ''),
(497, '8', '2', '10', '7', 'Complete the following sentences with commonly used nouns: I\'ll do this job as it is right up my', 'road', 'street', 'way', 'none of these', '', ''),
(498, '8', '2', '10', '7', 'Complete the following sentences with commonly used nouns: He has made a major _____ of that simple problem.', 'task', 'job', 'project', 'none of these', '', ''),
(499, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: Some are born great; ______achieve greatness.', 'some', 'any', 'no', 'other', '', ''),
(500, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: ______ of the boys could answer my question.', 'Someone', 'Anyone', 'None', 'Everyone', '', ''),
(501, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: ______ has stolen my purse.', 'Somebody', 'Anybody', 'Everybody', 'None of these', '', ''),
(502, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: Many passengers were injured when the train was derailed. Obviously, ______ escaped unhurt.', 'many', 'few', 'much', 'more', '', ''),
(503, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: ______ of Shelly\'s poems were received well during his life time.', 'None', 'No', 'Nobody', 'No one', '', ''),
(504, '8', '2', '10', '7', 'Fill in the blanks using suitable indefinite pronouns: _______ must not praise oneself.', 'Some', 'One', 'Any', 'No', '', ''),
(505, '8', '2', '10', '7', 'Fill in the blanks with the correct pronouns: I think we\'ve learnt a lot about ______ in this training workshop.', 'herself', 'himself', 'themselves', 'each other', '', ''),
(506, '8', '2', '10', '7', 'Fill in the blanks with the correct pronouns: The window seemed to open all by', 'itself', 'himself', 'ourselves', 'herself', '', ''),
(507, '8', '2', '10', '7', 'Fill in the blanks with the correct pronouns: We prepared _____ for the long journey to Goa.', 'himself', 'ourselves', 'themselves', 'yourself', '', ''),
(508, '8', '2', '10', '7', 'Fill in the blanks with the correct pronouns: Raju has invited all of ____ for dinner tonight.', 'they', 'we', 'us', 'none of these', '', ''),
(509, '8', '2', '10', '7', 'Fill in the blanks with the correct pronouns: It was very kind of ____to have come for the function.', 'them', 'those', 'themselves', 'each other', '', ''),
(510, '8', '2', '10', '7', 'Complete the following sentences with the given interrogative pronouns: _____ is going to Port Blair this summer?', 'Why', 'What', 'Who', 'When', '', ''),
(511, '8', '2', '10', '7', 'Complete the following sentences with the given interrogative pronouns: ______ did you get for your birthday this year?', 'Why', 'What', 'Where', 'When', '', ''),
(512, '8', '2', '10', '7', 'Complete the following sentences with the given interrogative pronouns: ______ did you invite to preside over the meeting?', 'Whom', 'Who', 'What', 'Whose', '', ''),
(513, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: You _____ to work in this branch. It is an order from the head office.', 'are', 'had', 'do', 'did', '', ''),
(514, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: ____ you brush your teeth every morning?', 'Are', 'Have', 'Do', 'Was', '', ''),
(515, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: They ____ talking at the top of their voice and disturbed us.', 'are', 'had', 'do', 'were', '', ''),
(516, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: I get up early in the morning and so ____ my sister.', 'did', 'has', 'is', 'does', '', ''),
(517, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: Fortunately, the old car ____ not break down on the way.', 'was', 'did', 'had', 'is', '', ''),
(518, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: It is generally seen that children _____ run after a flying butterfly.', 'will', 'shall', 'could', 'does', '', ''),
(519, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: Kittle cat and Mickie mouse _____ not live in the same house.', 'shall', 'have', 'are', 'did', '', ''),
(520, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: How _____ I tell the future? It is always uncertain.', 'should', 'is', 'can', 'has', '', ''),
(521, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: Take care. This wall _____ about to collapse.', 'will', 'is', 'can', 'does', '', ''),
(522, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: Beauty and brain _____ not often go together.', 'have', 'are', 'do', 'does', '', ''),
(523, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: ____ you please, wait for some time? I am busy.', 'Are', 'Could', 'Have', 'Should', '', ''),
(524, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: You ____ not use other\'s towel and toothbrush.', 'are', 'have', 'ought to', 'must', '', ''),
(525, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: He _____ be very rich those days.', 'used to', 'was', 'did', 'can', '', ''),
(526, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: You _____ not to talk while the teacher is teaching.', 'could', 'may', 'have', 'ought', '', ''),
(527, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: It is good that you _____ come. We were expecting you.', 'are', 'have', 'may', 'can', '', ''),
(528, '8', '2', '11', '2', 'Fill in the blanks with the correct auxiliary verbs from the choices given below: Monalisa _____ painted by Leonardo da Vinci.', 'has', 'was', 'will', 'could', '', ''),
(529, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: It is very important that all employees _____ (dress) in their proper uniforms before 6.30 a.m.', 'be dressed', 'are dressed', 'will be dressed', 'none of these', '', ''),
(530, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: The coach insisted that Ronaldo ____ (play) the centre position, even though he\'s too short for that position.', 'play', 'played', 'plays', 'none of these', '', ''),
(531, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: My mother would know what to do, only if she ____ (be) here with us now!', 'was been', 'were', 'has been', 'none of these', '', ''),
(532, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: I wish my brother ____ (be) here.', 'will be', 'would be', 'were', 'none of these', '', ''),
(533, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: People would only believe my story if I _____ (be) not so young.', 'would be', 'will be', 'could be', 'were', '', ''),
(534, '8', '2', '11', '2', 'Fill in the blanks with the most suitable form of the given verbs: If he _____ (go over) his lessons yesterday, he would have passed the exam with flying colours.', 'had gone over', 'would have gone over', 'went over', 'none of these', '', ''),
(535, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Take off', 'To wear', 'To remove', 'To collect', 'To snore', '', ''),
(536, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Take after', 'To resemble', 'To vary', 'To depart', 'To differ', '', ''),
(537, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Put away', 'To throw away', 'To push something', 'To discard', 'To put something at proper place after use', '', ''),
(538, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Look for', 'To watch something', 'To take care of', 'To search for something or somebody', 'To expect something', '', ''),
(539, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Go on', 'To appear', 'To happen', 'To exist', 'To switch on', '', ''),
(540, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Come across', 'To meet or find by chance', 'Mark something wrong', 'Cross a bridge', 'Come from opposite directions', '', ''),
(541, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Bring up', 'To teach somebody etiquette', 'Place somebody on a higher place', 'To raise someone up to adulthood', 'Educate somebody', '', ''),
(542, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Breakdown', 'Break the bottom of something', 'Get into something forcibly', 'To stop working because of a fault', 'End a relationship or break a marriage', '', ''),
(543, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Come over', 'Stay with you', 'Meet you in a restaurant', 'Cross a bridge', 'Visit someone', '', ''),
(544, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Drop someone off', 'To let someone out of a vehicle at a particular pl', 'Help somebody descent from a height', 'Help somebody come out of a car', 'Fall from a tree', '', ''),
(545, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Get on', 'To have a friendly relationship', 'To have a bad relationship', 'To have a family relationship', 'To have a difficult relationship', '', ''),
(546, '8', '2', '11', '2', 'Match the following phrasal verbs with their meanings: Give up', 'Stop doing something', 'Give a gift', 'Accept a gift', 'Accept with a smile', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questiontype`
--

CREATE TABLE `questiontype` (
  `qtId` smallint(11) NOT NULL,
  `typeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questiontype`
--

INSERT INTO `questiontype` (`qtId`, `typeName`, `Description`) VALUES
(1, 'LTA', 'Long Type Answers'),
(2, 'MCQ', 'Multiple Choice Questions'),
(3, 'STA', 'Short Type Answers'),
(4, 'VSTA', 'Very Short Type Answers'),
(5, 'CBSE', 'CBSE'),
(6, 'BT', 'Brain Teasers'),
(7, 'OWA', 'One Word Answers');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sectionId` int(11) NOT NULL,
  `Sections` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sectionId`, `Sections`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `sId` varchar(50) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `rollNumber` int(11) NOT NULL,
  `classId` char(25) DEFAULT NULL,
  `sectionId` char(1) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `systemEmail` varchar(50) NOT NULL COMMENT 'This will be auto generated',
  `pw` varchar(50) NOT NULL,
  `joinYear` varchar(25) DEFAULT NULL,
  `endYear` varchar(25) DEFAULT NULL,
  `phoneMobile` varchar(15) NOT NULL,
  `visibility` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`sId`, `firstName`, `lastName`, `rollNumber`, `classId`, `sectionId`, `Email`, `systemEmail`, `pw`, `joinYear`, `endYear`, `phoneMobile`, `visibility`) VALUES
('AabhaAcharya7440502336', 'Aabhra', 'Acharya', 15, '10', '5', 'AabhaAcharya@pxp.com', 'AabhaAcharya@mydomain.com', '7440502336', '2017', '', '7440502336', 'Y'),
('AabharanAgarwal6467471751', 'Aabharan', 'Agarwal', 16, '4', '1', 'AabharanAgarwal@mzb.com', 'AabharanAgarwal@mydomain.com', '6467471751', '2017', '', '6467471751', 'Y'),
('AabhasAgate2103988461', 'Aabhas', 'Agate', 17, '1', '3', 'AabhasAgate@wbu.com', 'AabhasAgate@mydomain.com', '2103988461', '2018', '', '2103988461', 'Y'),
('AabhassAggarwal1299381499', 'Aabhadua', 'Aggarwal', 18, '4', '6', 'AabhassAggarwal@jjz.com', 'AabhassAggarwal@mydomain.com', '1299381499', '2019', '', '1299381499', 'Y'),
('AabhavannanAgrawal1233971509', 'Aabhavannan', 'Agrawal', 19, '1', '4', 'AabhavannanAgrawal@teg.co', 'AabhavannanAgrawal@mydomain.com', '1233971509', '2014', '', '1233971509', 'Y'),
('AabheerAhluwalia5740600229', 'Aabheer', 'Ahluwalia', 20, '7', '1', 'AabheerAhluwalia@ahx.com', 'AabheerAhluwalia@mydomain.com', '5740600229', '2019', '', '5740600229', 'Y'),
('AabherAhuja4829971174', 'Aabher', 'Ahuja', 21, '2', '1', 'AabherAhuja@czp.com', 'AabherAhuja@mydomain.com', '4829971174', '2018', '', '4829971174', 'Y'),
('AacharappanAmble2655320758', 'Aacharappan', 'Amble', 22, '7', '5', 'AacharappanAmble@ltr.com', 'AacharappanAmble@mydomain.com', '2655320758', '2015', '', '2655320758', 'Y'),
('AacharyaAnand1201548763', 'Aacharya', 'Anand', 23, '5', '5', 'AacharyaAnand@duj.com', 'AacharyaAnand@mydomain.com', '1201548763', '2018', '', '1201548763', 'Y'),
('AachmanAndra5544423172', 'Aachman', 'Andra', 24, '9', '2', 'AachmanAndra@xtt.com', 'AachmanAndra@mydomain.com', '5544423172', '2014', '', '5544423172', 'Y'),
('AachuthanAnne2364020462', 'Aachuthan', 'Anne', 25, '10', '2', 'AachuthanAnne@pog.com', 'AachuthanAnne@mydomain.com', '2364020462', '2018', '', '2364020462', 'Y'),
('AadalarasanArora4293462099', 'Aadalarasan', 'Arora', 27, '10', '3', 'AadalarasanArora@tnp.com', 'AadalarasanArora@mydomain.com', '4293462099', '2016', '', '4293462099', 'Y'),
('AadalarasuArya1263296970', 'Aadalarasu', 'Arya', 28, '5', '3', 'AadalarasuArya@aqi.com', 'AadalarasuArya@mydomain.com', '1263296970', '2019', '', '1263296970', 'Y'),
('AadApte2005948474', 'Aad', 'Apte', 26, '5', '3', 'AadApte@nmr.com', 'AadApte@mydomain.com', '2005948474', '2015', '', '2005948474', 'Y'),
('AadarshAtwal3642347592', 'Aadarsh', 'Atwal', 29, '4', '5', 'AadarshAtwal@aix.com', 'AadarshAtwal@mydomain.com', '3642347592', '2016', '', '3642347592', 'Y'),
('AadavanAurora5300946917', 'Aadavan', 'Aurora', 30, '6', '4', 'AadavanAurora@awe.com', 'AadavanAurora@mydomain.com', '5300946917', '2019', '', '5300946917', 'Y'),
('AadavanBabu6833836173', 'Aadavan', 'Babu', 31, '5', '6', 'AadavanBabu@jsx.com', 'AadavanBabu@mydomain.com', '6833836173', '2014', '', '6833836173', 'Y'),
('AaddharBadal2355862007', 'Aaddhar', 'Badal', 32, '7', '6', 'AaddharBadal@sua.com', 'AaddharBadal@mydomain.com', '2355862007', '2015', '', '2355862007', 'Y'),
('AadeepBadami6967636528', 'Aadeep', 'Badami', 33, '1', '2', 'AadeepBadami@rnf.com', 'AadeepBadami@mydomain.com', '6967636528', '2019', '', '6967636528', 'Y'),
('AadeshBahl3212828130', 'Aadesh', 'Bahl', 34, '1', '6', 'AadeshBahl@eey.com', 'AadeshBahl@mydomain.com', '3212828130', '2014', '', '3212828130', 'Y'),
('AadeshwarBahri2870840118', 'Aadeshwar', 'Bahri', 35, '9', '3', 'AadeshwarBahri@vqx.com', 'AadeshwarBahri@mydomain.com', '2870840118', '2017', '', '2870840118', 'Y'),
('AadhanBail9873231318', 'Aadhan', 'Bail', 36, '12', '2', 'AadhanBail@irt.com', 'AadhanBail@mydomain.com', '9873231318', '2014', '', '9873231318', 'Y'),
('AbhijitPai9196633047', 'Abhijit', 'Pai', 12, '8', '1', 'apai193@yahoo.co.in', 'AbhijitPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9196633047', 'Y'),
('AbhijitPai9663304791', 'Abhijit', 'Pai', 9, '3', '5', 'apai1993@yahoo.com', 'AbhijitPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9663304791', 'Y'),
('AdityaPai9663304792', 'Aditya', 'Pai', 10, '8', '1', 'adityapai@y7mail.com', 'AdityaPaimydomain.com', '', '0000-00-00', '0000-00-00', '9663304792', 'Y'),
('ChorBhajia3322556688', 'Chor', 'Bhajia', 6, '2', '2', 'cbha@vkpsolutions.com', 'ChorBhajia@mydomain.com', '', '0000-00-00', '0000-00-00', '3322556688', 'Y'),
('DaamodarBains6697460354', 'Daamodar', 'Bains', 37, '9', '3', 'DaamodarBains@ciy.com', 'DaamodarBains@mydomain.com', '6697460354', '2016', '', '6697460354', 'Y'),
('DaarshikBajaj6252028601', 'Daarshik', 'Bajaj', 38, '9', '3', 'DaarshikBajaj@zif.com', 'DaarshikBajaj@mydomain.com', '6252028601', '2019', '', '6252028601', 'Y'),
('DaarukBajwa9599498968', 'Daaruk', 'Bajwa', 39, '2', '4', 'DaarukBajwa@kia.com', 'DaarukBajwa@mydomain.com', '9599498968', '2017', '', '9599498968', 'Y'),
('DaarunBakshi1759930847', 'Daarun', 'Bakshi', 40, '4', '3', 'DaarunBakshi@sst.com', 'DaarunBakshi@mydomain.com', '1759930847', '2014', '', '1759930847', 'Y'),
('DaasuBal5564801148', 'Daasu', 'Bal', 41, '10', '5', 'DaasuBal@idq.com', 'DaasuBal@mydomain.com', '5564801148', '2015', '', '5564801148', 'Y'),
('DabangBala7816307738', 'Dabang', 'Bala', 42, '5', '5', 'DabangBala@wqj.com', 'DabangBala@mydomain.com', '7816307738', '2015', '', '7816307738', 'Y'),
('DabeetBala5632918737', 'Dabeet', 'Bala', 43, '1', '3', 'DabeetBala@qzu.com', 'DabeetBala@mydomain.com', '5632918737', '2016', '', '5632918737', 'Y'),
('DabhitiBalakrishnan3415180208', 'Dabhiti', 'Balakrishnan', 44, '4', '4', 'DabhitiBalakrishnan@cpv.c', 'DabhitiBalakrishnan@mydomain.com', '3415180208', '2015', '', '3415180208', 'Y'),
('DabnshuBalan5281612819', 'Dabnshu', 'Balan', 45, '9', '1', 'DabnshuBalan@kfz.com', 'DabnshuBalan@mydomain.com', '5281612819', '2017', '', '5281612819', 'Y'),
('DadasahebBalasubramanian9396067830', 'Dadasaheb', 'Balasubramanian', 46, '12', '2', 'DadasahebBalasubramanian@', 'DadasahebBalasubramanian@mydomain.com', '9396067830', '2019', '', '9396067830', 'Y'),
('DadhicaBalay2211072885', 'Dadhica', 'Balay', 47, '12', '2', 'DadhicaBalay@vmc.com', 'DadhicaBalay@mydomain.com', '2211072885', '2016', '', '2211072885', 'Y'),
('DroopyStuppi15995611590', 'Droopy', 'Stuppi', 14, '9', '2', 'dstu@vkpsolutions.com', 'DroopiStuppi@mydomain.com', '', '0000-00-00', '0000-00-00', '15995611590', 'Y'),
('FalorSofa1424344454', 'Falor', 'Sofa', 13, '9', '2', 'fsof@vkpsolutions.com', 'FalorSofa@mydomain.com', '', '0000-00-00', '0000-00-00', '1424344454', 'Y'),
('fikkSicck1591591590', 'fikk', 'Sicck', 11, '8', '1', 'fs@fds.com', 'fikkSicck@mydomain.com', '', '0000-00-00', '0000-00-00', '1591591590', 'Y'),
('IKoota9966338855', 'Piddi', 'Koota', 4, '5', '1', 'pikoo@vkpsolutions.com', 'PiddiKoota@mydomain.com', '', '', '', '9966338855', 'Y'),
('IPoori1234567890', 'Joori', 'Poori', 7, '3', '5', 'jooripoori@asd.com', 'JooriPoori@mydomain.com', '', '2018', '2021', '1234567890', 'Y'),
('KavyaPai9611907001', 'Kavya', 'Pai', 1, '1', '1', 'vkaapai@yahoo.com', 'KavyaPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9611907001', 'Y'),
('PramodDumbo3652365201', 'Pramod', 'Dumbo', 2, '5', '1', 'pdum@vkpsolutions.com', 'PramodDumbo@mydomain.com', '', '0000-00-00', '0000-00-00', '3652365201', 'Y'),
('VarthaManishu6454342421', 'Vartha', 'Manishu', 3, '1', '2', 'vman@vkpsolutions.com', 'VarthaManishu@mydomain.com', '', '0000-00-00', '0000-00-00', '6454342421', 'Y'),
('VBaltu8787878787', 'Faltu', 'Baltu', 8, '3', '5', 'falbal@wewe.com', 'FaltuBaltu@mydomain.com', '', '2017', '2022', '8787878787', 'Y'),
('VIPanju4564564560', 'Ganju', 'Panju', 5, '2', '2', 'ganpan@vkpsolutions.com', 'GanjuPanju@mydomain.com', '', '', '', '4564564560', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` int(11) NOT NULL,
  `Subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `Subject`) VALUES
(8, 'Biology'),
(7, 'Chemistry'),
(12, 'Civics'),
(13, 'Commerce'),
(11, 'Computer Science'),
(14, 'Economics'),
(2, 'English'),
(10, 'Geography'),
(1, 'Hindi'),
(9, 'History'),
(3, 'Maths'),
(6, 'Physics'),
(4, 'Science'),
(5, 'Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `middleName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `systemEmail` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `joinYear` varchar(4) DEFAULT NULL,
  `leftYear` varchar(4) DEFAULT NULL,
  `visibility` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherId`, `firstName`, `middleName`, `lastName`, `Email`, `systemEmail`, `phoneNumber`, `joinYear`, `leftYear`, `visibility`) VALUES
(1, 'Haradi', 'Keshav', 'Pai', 'hkeshavpai@gmail.com', 'HaradiKeshavPai@mydomain.com', '+919611907001', NULL, NULL, 'Y'),
(2, 'Haradi', 'Aditya', 'Pai', 'adityapai@y7mail.com', 'HaradiAdityaPai@mydomain.com', '+917619118922 +46735147171', NULL, NULL, 'Y'),
(3, 'Haradi', 'Abhijit', 'Pai', 'apai1993@gmail.com', 'HaradiAbhijitPai@mydomain.com', '+919663304791', NULL, NULL, 'Y'),
(4, 'Vinaya', 'Keshav', 'Pai', 'vinayakeshavpai@gmail.com', 'VinayaKeshavPai@mydomain.com', '+919663304792', NULL, NULL, 'Y'),
(5, 'Kavya', 'Pai', 'T', 'kavyapai28@gmail.com', 'KavyaPaiT@mydomain.com', '+916366856667', NULL, NULL, 'Y'),
(6, 'Vasanta', 'Sudhakar', 'Rao', 'vinayapai@hotmail.com', 'VasantaSudhakarRao@mydomain.com', '+919611907001 mamama', NULL, NULL, 'Y'),
(7, 'Anita', 'Sudhakar', 'Rao', 'vkaapai@yahoo.com', 'AnitaSudhakarRao@mydomain.com', '+919611907001 pachi', NULL, NULL, 'Y'),
(9, 'Ganda', 'Wala', 'Teacher', 'gwt@asdf.com', 'GandaWalaTeacher@mydomain.com', '9686084792', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `todoId` int(11) NOT NULL,
  `todoText` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`todoId`, `todoText`) VALUES
(12, 'Remind Class VI D about assignment'),
(11, 'Set test paper for Class VB');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicId` int(11) NOT NULL,
  `classId` varchar(4) NOT NULL,
  `subjectId` varchar(50) NOT NULL,
  `topicName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `classId`, `subjectId`, `topicName`) VALUES
(1, '9', '6', 'Matter (Nat-n-Beh)'),
(2, '9', '8', 'Org in Liv Wld'),
(3, '9', '6', 'Mo\'n F\'ce and Wrk'),
(4, '9', '8', 'Our Env\r\n'),
(5, '9', '8', 'F n F-Prodn'),
(6, '9', '5', 'FrRev'),
(7, '2', '4', 'MatinOurSurrs'),
(8, '9', '5', 'PeopleasResource'),
(9, '1', '2', 'Classification'),
(10, '8', '2', 'Nouns and Pronouns'),
(11, '8', '2', 'Verbs'),
(12, '3', '1', 'kukku'),
(13, '3', '1', 'Shekhibaaz makkhi\r\n'),
(14, '3', '1', 'Chand wali amma\r\n'),
(15, '6', '5', 'Diversity'),
(16, '6', '5', 'Diversity and Discrimination\r\n'),
(17, '6', '5', 'Government\r\n'),
(18, '7', '8', 'Nutrition in Plants\r\n'),
(19, '7', '8', 'Nutrition in Animals\r\n'),
(20, '7', '8', 'Fibre to Fabrics\r\n'),
(21, '8', '9', 'How When and Where\r\n'),
(22, '8', '9', 'From Trade to Territory\r\n'),
(23, '8', '9', 'Ruling the Countryside\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_Id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classId`),
  ADD UNIQUE KEY `Class Number` (`classNumber`);

--
-- Indexes for table `classes_taught_by_teacher`
--
ALTER TABLE `classes_taught_by_teacher`
  ADD PRIMARY KEY (`cttId`),
  ADD UNIQUE KEY `teacherId` (`teacherId`,`classId`,`sectionId`,`subjectId`),
  ADD KEY `Class Number` (`classId`),
  ADD KEY `Section` (`sectionId`),
  ADD KEY `Subject` (`subjectId`);

--
-- Indexes for table `deploymentlog`
--
ALTER TABLE `deploymentlog`
  ADD PRIMARY KEY (`depId`),
  ADD UNIQUE KEY `Dedupe` (`assessmentId`,`depType`,`schStartDate`) USING BTREE;

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `questiontype`
--
ALTER TABLE `questiontype`
  ADD PRIMARY KEY (`qtId`),
  ADD UNIQUE KEY `unitName` (`typeName`),
  ADD UNIQUE KEY `typeName` (`typeName`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sectionId`),
  ADD UNIQUE KEY `Sections` (`Sections`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`sId`),
  ADD UNIQUE KEY `firstName` (`firstName`,`lastName`,`Email`,`phoneMobile`),
  ADD KEY `classNumber` (`classId`),
  ADD KEY `sectionAlpha` (`sectionId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`),
  ADD UNIQUE KEY `Subjects` (`Subject`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todoId`),
  ADD UNIQUE KEY `todoText` (`todoText`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classes_taught_by_teacher`
--
ALTER TABLE `classes_taught_by_teacher`
  MODIFY `cttId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `deploymentlog`
--
ALTER TABLE `deploymentlog`
  MODIFY `depId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto generated unique id for the deployment';

--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `qId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;

--
-- AUTO_INCREMENT for table `questiontype`
--
ALTER TABLE `questiontype`
  MODIFY `qtId` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_taught_by_teacher`
--
ALTER TABLE `classes_taught_by_teacher`
  ADD CONSTRAINT `Class Number` FOREIGN KEY (`classId`) REFERENCES `classes` (`classId`),
  ADD CONSTRAINT `Section` FOREIGN KEY (`sectionId`) REFERENCES `sections` (`sectionId`),
  ADD CONSTRAINT `Subject` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`subjectId`),
  ADD CONSTRAINT `Teacher` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`teacherId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
