#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Events
#------------------------------------------------------------

CREATE TABLE Events(
        idEvent       int (11) Auto_increment  NOT NULL ,
        Titre         Varchar (255) ,
        nbparticipant Int ,
        lieu          Varchar (255) ,
        dateEvent     Date ,
        heure         Int ,
        etat          Bool ,
        Description   Varchar (255) ,
        idUser        Int ,
        idCat         Int ,
        PRIMARY KEY (idEvent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        idUser     int (11) Auto_increment  NOT NULL ,
        mail       Varchar (255) ,
        nom        Varchar (255) ,
        prenom     Varchar (255) ,
        tel        Varchar (255) ,
        age        Int ,
        mdp        Varchar (255) ,
        cookieUser Varchar (255) ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MotCle
#------------------------------------------------------------

CREATE TABLE MotCle(
        idMot int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (idMot )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        idCat   int (11) Auto_increment  NOT NULL ,
        libelle Varchar (255) ,
        PRIMARY KEY (idCat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photos
#------------------------------------------------------------

CREATE TABLE Photos(
        idPhoto   Varchar (255) NOT NULL ,
        extension Varchar (255) ,
        idEvent   Int ,
        PRIMARY KEY (idPhoto )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaire
#------------------------------------------------------------

CREATE TABLE Commentaire(
        idCom   int (11) Auto_increment  NOT NULL ,
        Note    Int ,
        com     Varchar (255) ,
        idUser  Int ,
        idEvent Int ,
        PRIMARY KEY (idCom )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participe
#------------------------------------------------------------

CREATE TABLE participe(
        nbParticipants Int ,
        idUser         Int NOT NULL ,
        idEvent        Int NOT NULL ,
        PRIMARY KEY (idUser ,idEvent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: caracterise
#------------------------------------------------------------

CREATE TABLE caracterise(
        idEvent Int NOT NULL ,
        idMot   Int NOT NULL ,
        PRIMARY KEY (idEvent ,idMot )
)ENGINE=InnoDB;

ALTER TABLE Events ADD CONSTRAINT FK_Events_idUser FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE Events ADD CONSTRAINT FK_Events_idCat FOREIGN KEY (idCat) REFERENCES Categorie(idCat);
ALTER TABLE Photos ADD CONSTRAINT FK_Photos_idEvent FOREIGN KEY (idEvent) REFERENCES Events(idEvent);
ALTER TABLE Commentaire ADD CONSTRAINT FK_Commentaire_idUser FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE Commentaire ADD CONSTRAINT FK_Commentaire_idEvent FOREIGN KEY (idEvent) REFERENCES Events(idEvent);
ALTER TABLE participe ADD CONSTRAINT FK_participe_idUser FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE participe ADD CONSTRAINT FK_participe_idEvent FOREIGN KEY (idEvent) REFERENCES Events(idEvent);
ALTER TABLE caracterise ADD CONSTRAINT FK_caracterise_idEvent FOREIGN KEY (idEvent) REFERENCES Events(idEvent);
ALTER TABLE caracterise ADD CONSTRAINT FK_caracterise_idMot FOREIGN KEY (idMot) REFERENCES MotCle(idMot);
