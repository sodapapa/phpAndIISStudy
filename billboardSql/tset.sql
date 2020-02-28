/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.17-log : Database - dycis_mobile
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dycis_mobile` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dycis_mobile`;

/*Table structure for table `tn_billboard` */

DROP TABLE IF EXISTS `tn_billboard`;

CREATE TABLE `tn_billboard` (
  `BILLBOARD_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '게시판 ID',
  `BILLBOARD_TYPE` varchar(8) DEFAULT NULL COMMENT '게시판 타입(01:일반, 02:갤러리, 03:자료실)',
  `BILLBOARD_NM` varchar(100) DEFAULT NULL COMMENT '게시판 제목',
  `BILLBOARD_URL` varchar(100) DEFAULT NULL COMMENT '게시판 URL(KEY)',
  `WRITER_TYPE` varchar(8) DEFAULT NULL COMMENT '작성 권한(U:사용자, C:센터, M:관리자)',
  `COMMENT_YN` char(1) DEFAULT NULL COMMENT '댓글여부',
  `REPLY_YN` char(1) DEFAULT NULL COMMENT '답글여부',
  `USE_YN` char(1) DEFAULT NULL COMMENT '사용여부',
  `REG_ID` varchar(11) DEFAULT NULL COMMENT '등록 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  `MOD_ID` varchar(11) DEFAULT NULL COMMENT '수정자 ID',
  `MOD_DT` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`BILLBOARD_ID`),
  UNIQUE KEY `tn_billboard_UN` (`BILLBOARD_URL`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='게시판 그룹(종류)';

/*Table structure for table `tn_billboard_comment` */

DROP TABLE IF EXISTS `tn_billboard_comment`;

CREATE TABLE `tn_billboard_comment` (
  `BC_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '댓글 ID',
  `BI_ID` int(11) NOT NULL COMMENT '게시물 ID',
  `BC_CONTENTS` varchar(200) DEFAULT NULL COMMENT '댓글 내용',
  `DELETE_YN` char(1) DEFAULT NULL COMMENT '삭제 여부',
  `REG_TYPE` varchar(8) DEFAULT NULL COMMENT '등록자 구분(U:사용자, C:센터, M:관리자)',
  `REG_ID` varchar(11) DEFAULT NULL COMMENT '등록자 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  `MOD_TYPE` varchar(8) DEFAULT NULL COMMENT '수정자 구분(U:사용자, C:센터, M:관리자)',
  `MOD_ID` varchar(11) DEFAULT NULL COMMENT '수정자 ID',
  `MOD_DT` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`BC_ID`),
  KEY `tn_billboard_comment_fp1` (`BI_ID`),
  CONSTRAINT `tn_billboard_comment_fp1` FOREIGN KEY (`BI_ID`) REFERENCES `tn_billboard_info` (`BI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COMMENT='게시물 댓글';

/*Table structure for table `tn_billboard_gallery` */

DROP TABLE IF EXISTS `tn_billboard_gallery`;

CREATE TABLE `tn_billboard_gallery` (
  `BG_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '갤러리 ID',
  `BI_ID` int(11) NOT NULL COMMENT '게시물 ID',
  `FILE_PATH` varchar(100) DEFAULT NULL COMMENT '파일 경로',
  `FILE_NAME` varchar(100) DEFAULT NULL COMMENT '파일 이름',
  `FILE_FORMAT` varchar(50) DEFAULT NULL COMMENT '파일 포맷',
  `DELETE_YN` char(1) DEFAULT NULL COMMENT '삭제 여부',
  `REG_TYPE` varchar(8) DEFAULT NULL COMMENT '등록자 구분(U:사용자, C:센터, M:관리자)',
  `REG_ID` varchar(11) DEFAULT NULL COMMENT '등록자 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  `MOD_TYPE` varchar(8) DEFAULT NULL COMMENT '수정자 구분(U:사용자, C:센터, M:관리자)',
  `MOD_ID` varchar(11) DEFAULT NULL COMMENT '수정자 ID',
  `MOD_DT` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`BG_ID`),
  KEY `tn_billboard_gallery_fk1` (`BI_ID`),
  CONSTRAINT `tn_billboard_gallery_fk1` FOREIGN KEY (`BI_ID`) REFERENCES `tn_billboard_info` (`BI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COMMENT='게시물 갤러리';

/*Table structure for table `tn_billboard_info` */

DROP TABLE IF EXISTS `tn_billboard_info`;

CREATE TABLE `tn_billboard_info` (
  `BI_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '게시물 ID',
  `BILLBOARD_ID` int(11) NOT NULL COMMENT '게시판 ID',
  `BI_TITLE` varchar(50) DEFAULT NULL COMMENT '게시물 제목',
  `BI_CONTENTS` text COMMENT '게시물 내용',
  `P_BI_ID` int(11) DEFAULT NULL COMMENT '게시물 ID(최상위)',
  `R_BI_ID` int(11) DEFAULT NULL COMMENT '게시물 ID(상위)',
  `BI_DEPTH` int(11) DEFAULT '0' COMMENT '답글순서',
  `BI_ORDER` int(11) DEFAULT NULL COMMENT '게시물 순서',
  `NOTICE_YN` char(1) DEFAULT NULL COMMENT '공지여부',
  `DELETE_YN` char(1) DEFAULT NULL COMMENT '삭제여부',
  `LIKE_CNT` int(11) DEFAULT '0' COMMENT '좋아요 카운트',
  `READ_CNT` int(11) DEFAULT '0' COMMENT '읽은(뷰) 카운트',
  `PWD_VALUE` varchar(100) DEFAULT NULL COMMENT '게시물 비밀번호',
  `SC_ID` int(11) DEFAULT NULL COMMENT '1:1문의시 센터 ID',
  `REG_TYPE` varchar(8) DEFAULT NULL COMMENT '등록자 구분(U:사용자, C:센터, M:관리자)',
  `REG_ID` varchar(11) DEFAULT NULL COMMENT '등록자 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  `MOD_TYPE` varchar(8) DEFAULT NULL COMMENT '수정자 구분(U:사용자, C:센터, M:관리자)',
  `MOD_ID` varchar(11) DEFAULT NULL COMMENT '수정자 ID',
  `MOD_DT` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`BI_ID`),
  KEY `tn_billboard_info_fk1` (`BILLBOARD_ID`),
  CONSTRAINT `tn_billboard_info_fk1` FOREIGN KEY (`BILLBOARD_ID`) REFERENCES `tn_billboard` (`BILLBOARD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8 COMMENT='게시물 종류';

/*Table structure for table `tn_billboard_like` */

DROP TABLE IF EXISTS `tn_billboard_like`;

CREATE TABLE `tn_billboard_like` (
  `BI_ID` int(11) NOT NULL COMMENT '게시물 ID',
  `USER_ID` int(11) NOT NULL COMMENT '사용자 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  KEY `tn_billboard_like_fk1` (`BI_ID`),
  KEY `tn_billboard_like_fk2` (`USER_ID`),
  CONSTRAINT `tn_billboard_like_fk1` FOREIGN KEY (`BI_ID`) REFERENCES `tn_billboard_info` (`BI_ID`),
  CONSTRAINT `tn_billboard_like_fk2` FOREIGN KEY (`USER_ID`) REFERENCES `tn_user` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='게시물 좋아요 매핑';

/*Table structure for table `tn_billboard_pds` */

DROP TABLE IF EXISTS `tn_billboard_pds`;

CREATE TABLE `tn_billboard_pds` (
  `BP_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '자료실 ID',
  `BI_ID` int(11) NOT NULL COMMENT '게시물 ID',
  `FILE_PATH` varchar(100) DEFAULT NULL COMMENT '파일 경로',
  `FILE_NAME` varchar(100) DEFAULT NULL COMMENT '파일 이름',
  `FILE_FORMAT` varchar(50) DEFAULT NULL COMMENT '파일 포맷',
  `DELETE_YN` char(1) DEFAULT NULL COMMENT '삭제 여부',
  `REG_TYPE` varchar(8) DEFAULT NULL COMMENT '등록자 구분(U:사용자, C:센터, M:관리자)',
  `REG_ID` varchar(11) DEFAULT NULL COMMENT '등록자 ID',
  `REG_DT` datetime DEFAULT NULL COMMENT '등록일시',
  `MOD_TYPE` varchar(8) DEFAULT NULL COMMENT '수정자 구분(U:사용자, C:센터, M:관리자)',
  `MOD_ID` varchar(11) DEFAULT NULL COMMENT '수정자 ID',
  `MOD_DT` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`BP_ID`),
  KEY `tn_billboard_pds_fk1` (`BI_ID`),
  CONSTRAINT `tn_billboard_pds_fk1` FOREIGN KEY (`BI_ID`) REFERENCES `tn_billboard_info` (`BI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='게시물 자료실';

/*Table structure for table `tn_billboard_read` */

DROP TABLE IF EXISTS `tn_billboard_read`;

CREATE TABLE `tn_billboard_read` (
  `BI_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `REG_DT` datetime DEFAULT NULL,
  KEY `tn_billboard_read_FK` (`USER_ID`),
  KEY `tn_billboard_read_FK_1` (`BI_ID`),
  CONSTRAINT `tn_billboard_read_FK` FOREIGN KEY (`USER_ID`) REFERENCES `tn_user` (`USER_ID`),
  CONSTRAINT `tn_billboard_read_FK_1` FOREIGN KEY (`BI_ID`) REFERENCES `tn_billboard_info` (`BI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
