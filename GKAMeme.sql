#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Tag
#------------------------------------------------------------

CREATE TABLE Tag(
        Tag_id    int (11) Auto_increment  NOT NULL ,
        Tag_name  Varchar (64) NOT NULL ,
        Tag_likes Int NOT NULL ,
        Tag_dscrp Mediumint ,
        PRIMARY KEY (Tag_id ) ,
        UNIQUE (Tag_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        User_id                     int (11) Auto_increment  NOT NULL ,
        User_mail                   Varchar (25) NOT NULL ,
        User_password               Varchar (63) NOT NULL ,
        User_name                   Varchar (25) ,
        User_firstname              Varchar (25) ,
        User_birthdate              Date ,
        User_subscription_birthdate Date NOT NULL ,
        UserStatus_id               Int NOT NULL ,
        Uploader_id                 Int NOT NULL ,
        PRIMARY KEY (User_id ) ,
        UNIQUE (User_mail )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: File
#------------------------------------------------------------

CREATE TABLE File(
        File_id              int (11) Auto_increment  NOT NULL ,
        File_name            Varchar (128) NOT NULL ,
        File_path            Varchar (255) NOT NULL ,
        File_weight          Float ,
        File_size_x          Int ,
        File_size_y          Int ,
        File_upload_date     Date NOT NULL ,
        File_seen            Int NOT NULL ,
        File_likes           Int NOT NULL ,
        File_downloaded      Int NOT NULL ,
        File_is_private      Bool NOT NULL ,
        Uploader_id          Int NOT NULL ,
        FileType_id          Int NOT NULL ,
        UseType_id           Int NOT NULL ,
        CommentableEntity_id Int NOT NULL ,
        PRIMARY KEY (File_id ) ,
        UNIQUE (File_name ,File_path )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UserGroup
#------------------------------------------------------------

CREATE TABLE UserGroup(
        Usergroup_id            int (11) Auto_increment  NOT NULL ,
        Usergroup_name          Varchar (128) NOT NULL ,
        Usergroup_creation_date Date NOT NULL ,
        Usergroup_private       Bool NOT NULL ,
        UserGroup_is_private    Bool NOT NULL ,
        User_id                 Int NOT NULL ,
        Uploader_id             Int NOT NULL ,
        PRIMARY KEY (Usergroup_id ) ,
        UNIQUE (Usergroup_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FileType
#------------------------------------------------------------

CREATE TABLE FileType(
        FileType_id        int (11) Auto_increment  NOT NULL ,
        FileType_name      Varchar (25) NOT NULL ,
        FileType_extention Varchar (25) NOT NULL ,
        PRIMARY KEY (FileType_id ) ,
        UNIQUE (FileType_name ,FileType_extention )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Uploader
#------------------------------------------------------------

CREATE TABLE Uploader(
        Uploader_id int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (Uploader_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MemeWiki
#------------------------------------------------------------

CREATE TABLE MemeWiki(
        MemeWiki_id    int (11) Auto_increment  NOT NULL ,
        Meme_title     Varchar (64) ,
        Meme_dscrp     Text ,
        Meme_how_to_to Longtext ,
        Template_id    Int ,
        FileGroup_id   Int ,
        PRIMARY KEY (MemeWiki_id ) ,
        UNIQUE (Meme_title )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UseType
#------------------------------------------------------------

CREATE TABLE UseType(
        UseType_id    int (11) Auto_increment  NOT NULL ,
        UseType_name  Varchar (32) NOT NULL ,
        UseType_dscrp Mediumtext ,
        PRIMARY KEY (UseType_id ) ,
        UNIQUE (UseType_name ,UseType_dscrp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UserRole
#------------------------------------------------------------

CREATE TABLE UserRole(
        UserRole_id int (11) Auto_increment  NOT NULL ,
        UserRole_name Varchar (25) NOT NULL ,
        PRIMARY KEY (UserRole_id ) ,
        UNIQUE (UserRole_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UserStatus
#------------------------------------------------------------

CREATE TABLE UserStatus(
        UserStatus_id   int (11) Auto_increment  NOT NULL ,
        UserStatus_name Varchar (25) NOT NULL ,
        PRIMARY KEY (UserStatus_id ) ,
        UNIQUE (UserStatus_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TagInheritency
#------------------------------------------------------------

CREATE TABLE TagInheritency(
        TagInheritency_id  int (11) Auto_increment  NOT NULL ,
        Tag_id_son         Int NOT NULL ,
        Tag_id_father      Int NOT NULL ,
        PRIMARY KEY (TagInheritency_id )
)ENGINE=InnoDB;
²

#------------------------------------------------------------
# Table: Users_UserGroups
#------------------------------------------------------------

CREATE TABLE Users_UserGroups(
        User_id       Int NOT NULL ,
        Usergroup_id  Int NOT NULL ,
        UserRole_id Int NOT NULL ,
        PRIMARY KEY (User_id ,Usergroup_id ,UserRole_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Files_Tags
#------------------------------------------------------------

CREATE TABLE Files_Tags(
        File_id Int NOT NULL ,
        Tag_id  Int NOT NULL ,
        PRIMARY KEY (File_id ,Tag_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FileGroup
#------------------------------------------------------------

CREATE TABLE FileGroup(
        FileGroup_id int (11) Auto_increment  NOT NULL ,
        UseType_id   Int NOT NULL ,
        PRIMARY KEY (FileGroup_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

CREATE TABLE Comment(
        Comment_id           int (11) Auto_increment  NOT NULL ,
        Comment_text         Mediumint NOT NULL ,
        Comment_father_id    Int ,
        User_id              Int NOT NULL ,
        CommentableEntity_id Int NOT NULL ,
        PRIMARY KEY (Comment_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Request
#------------------------------------------------------------

CREATE TABLE Request(
        Request_id           int (11) Auto_increment  NOT NULL ,
        Request_title        Varchar (25) NOT NULL ,
        Request_dscrp        Text ,
        Request_data         Text ,
        CommentableEntity_id Int NOT NULL ,
        User_id              Int NOT NULL ,
        Poll_id              Int NOT NULL ,
        RequestType_id       Int NOT NULL ,
        PRIMARY KEY (Request_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MemeWikiCommit
#------------------------------------------------------------

CREATE TABLE MemeWikiCommit(
        MemeWikiCommit_id            int (11) Auto_increment  NOT NULL ,
        MemeWikiCommit_changed_field Int NOT NULL ,
        MemeWikiCommit_action        Int NOT NULL ,
        MemeWikiCommit_diff          Text ,
        User_id                      Int NOT NULL ,
        PRIMARY KEY (MemeWikiCommit_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: WikiElements
#------------------------------------------------------------

CREATE TABLE WikiElements(
        WikiElement_id   int (11) Auto_increment  NOT NULL ,
        WikiElement_name Varchar (25) ,
        PRIMARY KEY (WikiElement_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CommentableEntity
#------------------------------------------------------------

CREATE TABLE CommentableEntity(
        CommentableEntity_id int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (CommentableEntity_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BoolQuestion
#------------------------------------------------------------

CREATE TABLE BoolQuestion(
        BoolQuestion_id                int (11) Auto_increment  NOT NULL ,
        BoolQuestion_question          Int NOT NULL ,
        BoolQuestion_yes               Int NOT NULL ,
        BoolQuestion_no                Int NOT NULL ,
        BoolQuestion_is_valid          Bool NOT NULL ,
        BoolQuestion_valid_requirement Text ,
        BoolQuestion_documentation     Bool ,
        Poll_id                        Int NOT NULL ,
        PRIMARY KEY (BoolQuestion_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PollStatus
#------------------------------------------------------------

CREATE TABLE PollStatus(
        PollStatus_id   int (11) Auto_increment  NOT NULL ,
        PollStatus_name Varchar (25) NOT NULL ,
        PRIMARY KEY (PollStatus_id ) ,
        UNIQUE (PollStatus_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Poll
#------------------------------------------------------------

CREATE TABLE Poll(
        Poll_id                          int (11) Auto_increment  NOT NULL ,
        Poll_structure                   Text NOT NULL ,
        Poll_start                       Date NOT NULL ,
        Poll_end                         Date ,
        Poll_need_all_sub_question_valid Bool NOT NULL ,
        PollStatus_id                    Int NOT NULL ,
        User_id                          Int NOT NULL ,
        PRIMARY KEY (Poll_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MemeWikiRow
#------------------------------------------------------------

CREATE TABLE MemeWikiRow(
        MemeWikiRow_id           int (11) Auto_increment  NOT NULL ,
        MemeWikiRow_wiki_element Int NOT NULL ,
        PRIMARY KEY (MemeWikiRow_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RequestType
#------------------------------------------------------------

CREATE TABLE RequestType(
        RequestType_id   int (11) Auto_increment  NOT NULL ,
        RequestType_name Varchar (25) NOT NULL ,
        PRIMARY KEY (RequestType_id ) ,
        UNIQUE (RequestType_name )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Fifle_FileGroup
#------------------------------------------------------------

CREATE TABLE Fifle_FileGroup(
        FileGroup_id Int NOT NULL ,
        File_id      Int NOT NULL ,
        PRIMARY KEY (FileGroup_id ,File_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MemeWikiRow_id
#------------------------------------------------------------

CREATE TABLE MemeWikiRow_id(
        MemeWikiCommit_id Int NOT NULL ,
        MemeWikiRow_id    Int NOT NULL ,
        PRIMARY KEY (MemeWikiCommit_id ,MemeWikiRow_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: WikiElement_id
#------------------------------------------------------------

CREATE TABLE WikiElement_id(
        WikiElement_id Int NOT NULL ,
        MemeWikiRow_id Int NOT NULL ,
        PRIMARY KEY (WikiElement_id ,MemeWikiRow_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Meme_wiki_id
#------------------------------------------------------------

CREATE TABLE Meme_wiki_id(
        MemeWiki_id    Int NOT NULL ,
        MemeWikiRow_id Int NOT NULL ,
        PRIMARY KEY (MemeWiki_id ,MemeWikiRow_id )
)ENGINE=InnoDB;

ALTER TABLE User ADD CONSTRAINT FK_User_UserStatus_id FOREIGN KEY (UserStatus_id) REFERENCES UserStatus(UserStatus_id);
ALTER TABLE User ADD CONSTRAINT FK_User_Uploader_id FOREIGN KEY (Uploader_id) REFERENCES Uploader(Uploader_id);
ALTER TABLE File ADD CONSTRAINT FK_File_Uploader_id FOREIGN KEY (Uploader_id) REFERENCES Uploader(Uploader_id);
ALTER TABLE File ADD CONSTRAINT FK_File_FileType_id FOREIGN KEY (FileType_id) REFERENCES FileType(FileType_id);
ALTER TABLE File ADD CONSTRAINT FK_File_UseType_id FOREIGN KEY (UseType_id) REFERENCES UseType(UseType_id);
ALTER TABLE File ADD CONSTRAINT FK_File_CommentableEntity_id FOREIGN KEY (CommentableEntity_id) REFERENCES CommentableEntity(CommentableEntity_id);
ALTER TABLE UserGroup ADD CONSTRAINT FK_UserGroup_User_id FOREIGN KEY (User_id) REFERENCES User(User_id);
ALTER TABLE UserGroup ADD CONSTRAINT FK_UserGroup_Uploader_id FOREIGN KEY (Uploader_id) REFERENCES Uploader(Uploader_id);
ALTER TABLE MemeWiki ADD CONSTRAINT FK_MemeWiki_FileGroup_id FOREIGN KEY (FileGroup_id) REFERENCES FileGroup(FileGroup_id);
ALTER TABLE TagInheritency ADD CONSTRAINT FK_TagInheritency_Tag_id_son FOREIGN KEY (Tag_id_son) REFERENCES Tag(Tag_id);
ALTER TABLE TagInheritency ADD CONSTRAINT FK_TagInheritency_Tag_id_father FOREIGN KEY (Tag_id_father) REFERENCES Tag(Tag_id);
ALTER TABLE Users_UserGroups ADD CONSTRAINT FK_Users_UserGroups_User_id FOREIGN KEY (User_id) REFERENCES User(User_id);
ALTER TABLE Users_UserGroups ADD CONSTRAINT FK_Users_UserGroups_Usergroup_id FOREIGN KEY (Usergroup_id) REFERENCES UserGroup(Usergroup_id);
ALTER TABLE Users_UserGroups ADD CONSTRAINT FK_Users_UserGroups_UserRole_id FOREIGN KEY (UserRole_id) REFERENCES UserRole(UserRole_id);
ALTER TABLE Files_Tags ADD CONSTRAINT FK_Files_Tags_File_id FOREIGN KEY (File_id) REFERENCES File(File_id);
ALTER TABLE Files_Tags ADD CONSTRAINT FK_Files_Tags_Tag_id FOREIGN KEY (Tag_id) REFERENCES Tag(Tag_id);
ALTER TABLE FileGroup ADD CONSTRAINT FK_FileGroup_UseType_id FOREIGN KEY (UseType_id) REFERENCES UseType(UseType_id);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_User_id FOREIGN KEY (Author_id) REFERENCES User(User_id);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_CommentableEntity_id FOREIGN KEY (CommentableEntity_id) REFERENCES CommentableEntity(CommentableEntity_id);
ALTER TABLE Request ADD CONSTRAINT FK_Request_CommentableEntity_id FOREIGN KEY (CommentableEntity_id) REFERENCES CommentableEntity(CommentableEntity_id);
ALTER TABLE Request ADD CONSTRAINT FK_Request_User_id FOREIGN KEY (User_id) REFERENCES User(User_id);
ALTER TABLE Request ADD CONSTRAINT FK_Request_Poll_id FOREIGN KEY (Poll_id) REFERENCES Poll(Poll_id);
ALTER TABLE Request ADD CONSTRAINT FK_Request_RequestType_id FOREIGN KEY (RequestType_id) REFERENCES RequestType(RequestType_id);
ALTER TABLE MemeWikiCommit ADD CONSTRAINT FK_MemeWikiCommit_User_id FOREIGN KEY (User_id) REFERENCES User(User_id);
ALTER TABLE BoolQuestion ADD CONSTRAINT FK_BoolQuestion_Poll_id FOREIGN KEY (Poll_id) REFERENCES Poll(Poll_id);
ALTER TABLE Poll ADD CONSTRAINT FK_Poll_PollStatus_id FOREIGN KEY (PollStatus_id) REFERENCES PollStatus(PollStatus_id);
ALTER TABLE Poll ADD CONSTRAINT FK_Poll_User_id FOREIGN KEY (User_id) REFERENCES User(User_id);
ALTER TABLE Fifle_FileGroup ADD CONSTRAINT FK_Fifle_FileGroup_FileGroup_id FOREIGN KEY (FileGroup_id) REFERENCES FileGroup(FileGroup_id);
ALTER TABLE Fifle_FileGroup ADD CONSTRAINT FK_Fifle_FileGroup_File_id FOREIGN KEY (File_id) REFERENCES File(File_id);
ALTER TABLE MemeWikiRow_id ADD CONSTRAINT FK_MemeWikiRow_id_MemeWikiCommit_id FOREIGN KEY (MemeWikiCommit_id) REFERENCES MemeWikiCommit(MemeWikiCommit_id);
ALTER TABLE MemeWikiRow_id ADD CONSTRAINT FK_MemeWikiRow_id_MemeWikiRow_id FOREIGN KEY (MemeWikiRow_id) REFERENCES MemeWikiRow(MemeWikiRow_id);
ALTER TABLE WikiElement_id ADD CONSTRAINT FK_WikiElement_id_WikiElement_id FOREIGN KEY (WikiElement_id) REFERENCES WikiElements(WikiElement_id);
ALTER TABLE WikiElement_id ADD CONSTRAINT FK_WikiElement_id_MemeWikiRow_id FOREIGN KEY (MemeWikiRow_id) REFERENCES MemeWikiRow(MemeWikiRow_id);
ALTER TABLE Meme_wiki_id ADD CONSTRAINT FK_Meme_wiki_id_MemeWiki_id FOREIGN KEY (MemeWiki_id) REFERENCES MemeWiki(MemeWiki_id);
ALTER TABLE Meme_wiki_id ADD CONSTRAINT FK_Meme_wiki_id_MemeWikiRow_id FOREIGN KEY (MemeWikiRow_id) REFERENCES MemeWikiRow(MemeWikiRow_id);
