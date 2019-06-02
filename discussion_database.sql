-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2016 at 04:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discussion_forum_db`
--
CREATE DATABASE IF NOT EXISTS `discussion_forum_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `discussion_forum_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'sandeep', 'mansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_name`) VALUES
(1, 'EDUCATION'),
(2, 'FOOD'),
(3, 'GAMES'),
(4, 'SOCIAL MEDIA'),
(6, 'POLITICS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `comment_like_count` int(11) NOT NULL,
  `comment_dislike_count` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `topic_id`, `user_id`, `comment_description`, `comment_date`, `comment_like_count`, `comment_dislike_count`) VALUES
(1, 3, 1, 'nice post', '2016-07-28', 3, 2),
(2, 6, 1, 'ghjfheigjreog', '2016-07-29', 0, 0),
(3, 21, 6, 'new enteries my bring some change in country if they do so well.', '2016-07-30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(30) NOT NULL,
  `news_description` text NOT NULL,
  `news_image` text NOT NULL,
  `news_addedon` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_description`, `news_image`, `news_addedon`) VALUES
(1, 'Monkey spends 30 minutes in Pa', ' NEW DELHI: As lawmakers were going about their business on Thursday, a monkey business was unfolding in the Parliament House library adjoining the Central Hall. And this because a simian had found its way into the reading room meant for MPs and journalists. The monkey roamed around the reading room for half an hour.', 'images/monkey.jpg', '2016-07-29'),
(2, 'Be quiet: Trump asks female re', ' Republican presidential nominee Donald Trump during a live TV press conference asked a female reporter to  be quiet  following a heated discussion. The incident occurred at the press conference in Florida on Wednesday, during which NBC News correspondent Katy Tur asked the real estate mogul whether he had  any qualms about asking a foreign government, Russia, China, anybody, to interfere, to hack into a system of anybody in this country,  the New York Magazine reported. She pressed him, reading back one of his own quotes, to which he replied,  Well, they probably have (the emails). I d like to have them released.', 'images/trumpp.jpg', '2016-07-29'),
(3, 'WhatsApp Finally Launches Desk', ' Though itâ€™s the biggest messaging application in the world with more than 1 billion active users, WhatsApp has for years lived primarily on mobile phones. That could change significantly from Wednesday, when WhatsApp launched its first desktop apps for Windows 8 and Mac OS 10.9 and up. The apps sync with a WhatsApp userâ€™s account on their mobile device, once theyâ€™ve downloaded them and scanned a QR code from inside Settings > WhatsApp Web on the mobile app. WhatsApp has made itself available on desktop before, through a web client called WhatsApp Web. The company launched that service in January 2015, initially for Android and Windows Phone users, before adding support for iOS users as well. But its new desktop apps offer more native support, the ability to use keyboard shortcuts, and the ability to have messages open in a separate window as opposed to being in a browser or lost in a sea of tabs.', 'images/whatsapp.jpg', '2016-07-29'),
(4, ' How Facebook Helped Reunite M', ' PARIS: HIGHLIGHTS Social media giant Facebook on Friday became a saviour for an eight-month-old boy who was separated from his mother in a stampede after a terrorist ploughed his truck through a crowd of thousands enjoying Bastille Day celebrations in Nice city, mowing down at least 84 people, injuring some 150. Tiava Banner was separated from her eight-month-old son after the mayhem. She later posted on Facebook, appealing for anyone who had seen her son, The Mirror reported.', 'images/facebook.jpg', '2016-07-29'),
(5, 'Kejriwal in Amritsar for Majit', 'As Delhi chief minister Arvind Kejriwal landed here for appearance in a court in a defamation case filed by Punjab revenue minister Bikram Majithia, the Shiromani Akali Dal (SAD) leaders held a closed-door meeting in the evening. There is apprehension that a large number of Aam Aadmi Party workers will converge to show solidarity with their leader on Friday.', 'images/kejrival.jpg', '2016-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topics`
--

CREATE TABLE IF NOT EXISTS `tbl_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `topic_title` text NOT NULL,
  `topic_description` text NOT NULL,
  `topic_date` date NOT NULL,
  `topic_image` text NOT NULL,
  `topic_like_count` int(11) NOT NULL,
  `topic_dislike_count` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_topics`
--

INSERT INTO `tbl_topics` (`topic_id`, `cat_id`, `topic_title`, `topic_description`, `topic_date`, `topic_image`, `topic_like_count`, `topic_dislike_count`) VALUES
(2, 4, 'Great Demand Of Facebook', ' Facebook has helped a lot to create a personal brand for many individuals and for businesses. Moreover, itâ€™s a major source of entertainment for people around the globe. Since, Facebook is a global social networking site available in various languages, country and language is not a barrier. Also, with the Facebook translation feature, you will never miss out on connecting with Facebook users from different countries and with people who speaks different languages.', '2016-07-23', 'images/medias.jpg', 0, 0),
(3, 2, 'Healthy Soil Helps In Better Health Production', ' The most widely recognized function of soil is its support for food production. It is the foundation for agriculture and the medium in which nearly all food-producing plants grow. In fact, it is estimated that 95% of our food is directly or indirectly produced on our soils. Healthy soils supply the essential nutrients, water, oxygen and root support that our food-producing plants need to grow and flourish. Soils also serve as a buffer to protect delicate plant roots from drastic fluctuations in temperature.', '2016-07-23', 'images/soil.jpg', 0, 0),
(4, 2, 'Improving Food Safety And Quality To Safe Public Health', ' Ensuring food safety is a public health priority, and an essential step to achieving food security. Effective food safety and quality management systems are key not only to safeguarding the health and well-being of people but also to fostering economic development and improving livelihoods by promoting access to domestic, regional and international markets.', '2016-07-23', 'images/healthy.jpg', 0, 0),
(6, 1, 'Knowledge', ' As the use of computer technology in education expands, participants, administrators and observers continually wonder what is effective and what is a distraction. Unfortunately, many applications of technology in the classroom serve only to dilute the learning experience as students misuse resources or engage in unproductive diversions. As a learning aid, discussion forums, on the other hand, have shown to stimulate critical thinking, improve communication skills, foster a sense of community among students, and encourage collaborative problem solving. Further, online forums enable students to work together on projects and participate at-will in evocative dialogues centered on course content. Students will, however, have different reactions to text based discussions. Some may be frustrated by having to type everything they want to say while those with superior writing skills will have the advantage. Ironically, strong writers may not be the same students who exhibit verbal superiority in the classroom. Consequently, those who are ignored or interrupted during class discussion will often avail themselves of the expressive opportunity and display stronger "voices" in discussion forums.', '2016-07-26', 'images/knowledge.jpg', 0, 0),
(7, 1, 'Participation Increases', ' Two key challenges are addressed in recent research into participation in discussion boards: first, ensuring participation in the forum; and second, ensuring quality discussion in the forum. Educators need to scaffold student motivation by bei ng explicit about expectations and ground rules for online discussion forums, for this sets the framework for interaction, peer collaboration and dialogue. Accordingly, a number of researchers point out the need for higher order learning tasks that promote critical thinking (Richardson & Ice, 2010) and eva luation (Cheng, ParÃ©, Collimore & Joordens, 2011) in discussion forum interaction. Hou (2011), in a mixed method study in a cohort of 32 Information Management students, found that role playing and problem - solving were effective strategies to ensure student interaction. Zydney, deNoyelles and Seo (2012) tested an online protocol with one cluster of tertiary students and more open questions with another cluster. Although they used a small convenience sample, their findings suggest this approach has the capacity to enhance dynamic interaction and provide richer learning experiences. Similarly, Gikandi, Morrow and Davis (2011) found formative feedback and authentic assessment are excellent ways to encourage qua lity participation and interaction that facilitates the sharing of knowledge and creates a community of inquiry', '2016-07-29', 'images/discussion.jpg', 0, 0),
(8, 1, 'Motivating Students', ' Establishing an environment in which the students are proactive and independent learners in the collaborative sense (see Chan & Chan 2011, above) is crucial for avo iding the dependency and passivity that may characterise more instructor - focused forums. Hew and Cheungâ€™s (2008) work demonstrates the value of structuring in student facilitation of peer interaction to achieve higher levels of participation. They point ou t that most studies have been conducted on the lecturerâ€™s or instructorâ€™s role in facilitating participation, and not on student directed involvement.', '2016-07-29', 'images/educations.jpg', 0, 0),
(9, 1, 'Managing Expectations', ' Educators face a number of pressures in providing engaging and effective participation in an online environme nt. One crucial factor is that responses to student must be timely, for significant time lags in feedback from peers and instructors are a distinct disadvantage of asynchronous discussion forums (Dringus & Ellis, 2005). Kalman and Rafaeli (2005) and Niemi (2002) identify the frustration distance students expressed in their messages when they do not receive feedback on their postings within a reasonable time frame. There is little doubt that late responses have a negative effect on the vitality of discussion forums, and one outcome of this is that the participation rate is likely to drop due to such delays (Dringus & Ellis, 2010). At the same time, Mazzolini and Maddison (2007, p. 204) point out that the timing o f instructor intervention is critical, for â€œcom ing in too early with comments tends to shut down discussion.â€', '2016-07-29', 'images/startup.jpg', 0, 0),
(10, 2, 'Junk Food Harmful For Health', ' Food is fuel for your body. It has a direct impact on how you feel as well as on your overall health. Fast food isnâ€™t necessarily bad, but in many cases itâ€™s highly processed and contains large amounts of carbohydrates, added sugar, unhealthy fats, and salt (sodium). These foods are often high in calories yet offer little or no nutritional value. When fast food frequently replaces nutritious foods in your diet, it can lead to poor nutrition, poor health, and weight gain. Tests in lab animals have even shown a negative effect in short duration diets. Being overweight is a risk factor for a variety of chronic health problems including heart disease, diabetes, and stroke. According to the Robert Wood Johnson Foundation, most people underestimate the number of calories theyâ€™re eating in a fast-food restaurant. A 2013 study published in JAMA Pediatrics showed that children and adolescents take in more calories in fast food and other restaurants than at home. Eating at a restaurant added between 160 and 310 calories a day.', '2016-07-29', 'images/food.jpg', 0, 0),
(11, 2, 'Eating Fruits Makes  Us Healthy', ' The health benefits of fruits guarantee you optimum health and a well-built body in the long run. Fruits benefit your body immensely as they are natural sources of vitamins and minerals, which are essential for the proper functioning of the body. Rich in dietary fiber, fruits also help to improve the functioning of the digestive tract. Fruits are an important part of a healthy diet for those who want to lose weight; they give ample energy and nearly every nutrient that your body needs to curb weight gain, without adding any unnecessary fats. Moreover, fruits help you to stay away from health complications like heat stroke, high blood pressure, cancer, heart ailments, and diabetes. Fruits effectively fight skin disorders and promote healthy hair growth. It is always suggested to eat raw, fresh and ripe fruits because then you experience the real health benefits, rather than consuming them after processing or cooking.', '2016-07-29', 'images/fruitss.jpg', 0, 0),
(12, 3, 'Playing Games Good  For Health', ' Play is not just essential for kids; it can be an important source of relaxation and stimulation for adults as well. Playing with your romantic partner, friends, co-workers, pets, and children is a sure (and fun) way to fuel your imagination, creativity, problem-solving abilities, and emotional well-being. Adult play is a time to forget about work and commitments, and to be social in an unstructured, creative way. Focus your play on the actual experience, not on accomplishing any goal. There doesnâ€™t need to be any point to the activity beyond having fun and enjoying yourself. Play could be simply goofing off with friends, sharing jokes with a coworker, throwing a Frisbee on the beach, dressing up at Halloween with your kids, building a snowman in the yard, playing fetch with a dog, a game of charades at a party, or going for a bike ride with your spouse with no destination in mind. By giving yourself permission to play with the joyful abandon of childhood, you can reap oodles of health benefits throughout life.', '2016-07-29', 'images/football.jpg', 1, 0),
(13, 3, 'Makes Us Far From Diseases', ' We already discussed how games can help with memory, but they can also help with overall cognitive function as well. That means that by sinking some time into your favorite game, you can be working on becoming more attentive, focused, and perceptive â€” all while thinking critically and making decisions, in-game. This is especially important as game-playing may be a viable treatment option for folks suffering from age-related cognitive diseases, like Alzheimerâ€™s and dementia.', '2016-07-29', 'images/fitness.jpg', 0, 0),
(14, 3, 'Make Us Mentally Strong', ' As it turns out, games can keep your brain busy while not slamming you with any of the stress and anxiety that real-world problems present. Playing Angry Birds, for example, is a simple and relaxing exercise for many personality types. Games can also be a social outlet, allowing those who are lonely a chance to get some interaction.', '2016-07-29', 'images/mentallyfit.jpg', 0, 0),
(15, 3, 'Sharpen Decision Making', ' Others, like strategy games, require you to think critically on a very high level. Even a first-person shooter requires a good deal of critical thinking and strategy, rather than just â€œaim and shoot.â€ The skills polished by playing games can actually translate well into the real world as well, studies are finding.', '2016-07-29', 'images/fall.jpg', 0, 0),
(16, 4, 'Use Of  Whatsapp', ' You can easily send free messages to any part of the world without any charges. This service is completely free. All tools provided by Whatsapp are very easy to use. It do not have any advertisements on display screen. This app automatically imports the contacts from your phone and tells you that how many of your friends are using Whatsapp. You can share your location, photos, status with your friends. You need not spend any money for chatting and sharing with your friends. It also allows you to send 100 messages a month to any of your friends not using Whatsapp for free.', '2016-07-29', 'images/watsapp.jpg', 0, 0),
(17, 4, 'Benefits Of  Gmail', ' GMAIL	Use Gmail to store data, and you can access it from any location that has an Internet connection. Simply log into your Gmail account and find the message that contains your data. You canâ€™t lose your information, either; that could happen when you store it on a hard drive that might fail. Keeping data in Gmail also makes it easy to share with others. For example, if one of your messages contains a video youâ€™d like to share, you can forward it to a friend without having to upload the video first.', '2016-07-29', 'images/gmailpic.jpg', 0, 0),
(18, 4, 'Benefits Of Social Media', ' compelling and relevant content will grab the attention of potential customers and increase brand visibility you can respond almost instantly to industry developments and become heard in your field it can be much cheaper than traditional advertising and promotional activities social content can indirectly boost links to website content by appearing in universal search results, improving search traffic and online sales', '2016-07-29', 'images/social.jpg', 0, 0),
(19, 6, 'How Politics Makes Us Suffer Sometimes', ' Democracy is supposed to be rule of the people, by the people, and for the people. But in order to rule effectively, the people need political knowledge. If they know little or nothing about government, it becomes difficult to hold political leaders accountable for their performance. Unfortunately, public knowledge about politics is disturbingly low. In addition, the public also often does a poor job of evaluating the political information they do know. This state of affairs has persisted despite rising education levels, increased availability of information thanks to modern technology, and even rising IQ scores. It is mostly the result of rational behavior, not stupidity. Such widespread and persistent political ignorance and irrationality strengthens the case for limiting and decentralizing the power of government.', '2016-07-29', 'images/government.jpg', 0, 0),
(20, 6, 'Politics Is A Game', ' Politics, it seems to me, for years, or all too long, has been concerned with right or left instead of right or wrong. ~Richard Armour Politicians and diapers should be changed frequently and all for the same reason. ~JosÃ© Maria de EÃ§a de Queiroz, translated from Portuguese Hell, I never vote for anybody, I always vote against. ~W.C. Fields We live in a world in which politics has replaced philosophy. ~Martin L. Gross, A Call for Revolution, 1993 There are many men of principle in both parties in America, but there is no party of principle. ~Alexis de Tocqueville', '2016-07-29', 'images/politics1.jpg', 0, 0),
(21, 6, 'Entry Of Youth In Politics', ' The Importance of Youth in Politics Jan\r\n5\r\nby digestiblepolitics\r\nUnfortunately,  the youth of today have been given such a bad name when it is only a minority of people who are creating social disruption. Most youthful people are motivated and long to do well in everything they do, which means they could be a very important aspect in politics.\r\n\r\nFirstly, young people have different perspectives and a host of different ideas. By allowing them to voice their opinion we could be opening and moving the political world forward. This is not only good for society, but necessary for society. If the young did not engage with politics, even if it is through pressure groups, there would be many issues with our political establishments in trying to keep policy fair and sustainable for future generations. For example, equal rights for women required many young women to engage with the issue at hand. Why? Because they had strong feelings for the issue at hand, and that is something that countries should work to increase â€“ interest and opinion on political matters.', '2016-07-29', 'images/youth.jpg', 0, 0),
(22, 6, 'Corruption In Politics', ' Political corruption is the use of power by government officials for illegitimate private gain.\r\n\r\nAn illegal act by an officeholder constitutes political corruption only if the act is directly related to their official duties, is done under color of law or involves trading in influence.\r\n\r\nForms of corruption vary, but include bribery, extortion, cronyism, nepotism, patronage, graft, and embezzlement.\r\n\r\nCorruption may facilitate criminal enterprise such as drug trafficking, money laundering, and human trafficking, though is not restricted to these activities.\r\n\r\nMisuse of government power for other purposes, such as repression of political opponents and general police brutality, is not considered political corruption.\r\n\r\nNeither are illegal acts by private persons or corporations not directly involved with the government.\r\n\r\nThe activities that constitute illegal corruption differ depending on the country or jurisdiction.\r\n\r\nFor instance, some political funding practices that are legal in one place may be illegal in another.\r\n\r\nIn some cases, government officials have broad or ill-defined powers, which make it difficult to distinguish between legal and illegal actions.\r\n\r\nWorldwide, bribery alone is estimated to involve over 1 trillion US dollars annually.\r\n\r\nA state of unrestrained political corruption is known as a kleptocracy, literally meaning "rule by thieves."\r\n\r\nSome forms of corruption -- now called "institutional corruption" -- are distinguished from bribery and other kinds of obvious personal gain.\r\n\r\nCampaign contributions are the prime example.\r\n\r\nEven when they are legal, and do not constitute a quid pro quo, they have a tendency to bias the process in favor of special interests and undermine public confidence in the political institution.\r\n\r\nThey corrupt the institution without individual members being corrupt themselves.\r\n\r\nA similar problem of corruption arises in any institution that depends on financial support from people who have interests that may conflict with the primary purpose of the institution.', '2016-07-29', 'images/corruption.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_gender` char(10) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_addedon` date NOT NULL,
  `user_updatedon` date NOT NULL,
  `user_image` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_password`, `user_gender`, `user_city`, `user_state`, `user_country`, `user_addedon`, `user_updatedon`, `user_image`) VALUES
(1, 'aman', 9412075184, 'amandeep12@yahoo.com', 'amandeep', 'male', 'ambala cantt', 'haryana', 'india', '2016-07-15', '2016-07-15', 'images/user.jpg'),
(2, 'mansi', 9998754260, 'mansi@yahoo.in', 'mansi', 'female', 'ambala cantt', 'haryana', 'india', '2016-07-19', '2016-07-19', 'images/user1.jpg'),
(4, 'neha', 9836785024, 'neha@yahoo.com', 'neha', 'female', 'yamunanagar', 'haryana', 'india', '2016-07-26', '2016-07-26', 'images/f1.jpg'),
(5, 'seema', 9034877986, 'seema@gmail.com', 'seema', 'female', 'ambala cantt', 'haryana', 'india', '2016-07-26', '2016-07-26', 'images/ab.jpg'),
(6, 'sandeep', 563984093, 'sandeep1@gmail.com', 'sandeep', 'female', 'ambala cantt', 'haryana', 'india', '2016-07-27', '2016-07-27', 'images/f1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
