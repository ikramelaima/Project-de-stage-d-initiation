drop database if exists  gestion_docs;
create database if not exists  gestion_docs;
use gestion_docs;

CREATE TABLE doc (
   iddocs int(4) auto_increment primary key,
   titre varchar(50),
   pilote varchar(50),
   code varchar(50),
   support_document varchar(50),
   mise_ajour varchar(500),
   souscripteur varchar(50),
   destinataires varchar(500),
   lieu_du_classement varchar(500),
   fpdf varchar(500)
);
CREATE TABLE corbeille_docs (
    idd INT AUTO_INCREMENT PRIMARY KEY,
    tit VARCHAR(255) ,
    pil VARCHAR(255) ,
    co VARCHAR(50) ,
    support VARCHAR(100) ,
    mise varchar(500),
    sous VARCHAR(255) ,
    dest VARCHAR(255) ,
    lieu VARCHAR(255) 
);

CREATE TABLE utilisateurs (
   iduser int(5) auto_increment primary key,
   nomprenom varchar(100),
   fonction varchar(50),
   groupe varchar(3000),
   photo varchar(100),
   admiin varchar(50),
   email varchar(250),
   etat int(1),
   mode_passe varchar(300)
);

INSERT INTO utilisateurs(nomprenom,fonction,groupe,photo,admiin,email,etat,mode_passe) VALUES
  	('TIJANI TARIK','ESCA','SERVICE TECHNIQUE NAVIGATION','img1.png','OUI','ikramelaima6@gmail.com',1,'123'),
	('EL HIJI ANAS','ESCA','SERVICE TECHNIQUE NAVIGATION','img1.png','NON','ikramelaima1@gmail.com',1,'123'),
    ('HASSABI KARIMA','ATC','SECTION CONTROLE AERIEN','img2.png','NON','ikramelaima2@gmail.com',1,'123'),
    ('HAMRY YOUSRA','ATC','SECTION CONTROLE AERIEN','img3.jpg','NON','ikramelaima3@gmail.com',1,'123'),
    ('GAJMAL NADIA','ATC','SECTION CONTROLE AERIEN','img4.png','NON','ikramelaima4@gmail.com',0,'123'),
     ('SAFRIOUI SALIM','SEA','SERVICE RESSOURCES & ACTIVITÉS CONCEDEES','img8.png','OUI','ikramelaima5@gmail.com',1,'123'),
       ('SAFRIOUI  MARIAME','EA','SERVICE EXPLOITATION AEROPORTUAIRE','img5.png','OUI','ikramelaima6@gmail.com',1,'123'),
        ('SAFRIOUI LINA','SEA','SERVICE RESSOURCES & ACTIVITÉS CONCEDEES','img6.png','OUI','ikramelaima7@gmail.com',1,'123'),
          ('SAFRIOUI HIBA','JHT','SERVICE EXPLOITATION AEROPORTUAIRE','img7.png','OUI','ikramelaima8@gmail.com',0,'123'),
           ('SAFRIOUI KARAM','MRV','SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT','img9.png','OUI','ikramelaima0@gmail.com',1,'123'),
            ('SOUIRI JAD','ABC','SERVICE AERIENNE','img14.png','OUI','ikramelaima9@gmail.com',0,'123'),
              ('ZZZZ HICHAM','GSS','SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT','img10.png','OUI','ikramelai0@gmail.com',1,'123'),
                ('SALEH KAMAL','SEA','SERVICE AERIENNE','img13.jpg','OUI','ikramelaima11@gmail.com',0,'123'),
                  ('STIR SAMIR','SEA','SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT','img11.png','NON','ikramelaim@gmail.com',1,'123'),
                   ('XXX RIDA','ESCA','SERVICE TECHNIQUE NAVIGATION','img12.jpg','OUI','ikramela0@gmail.com',1,'123');

   INSERT INTO doc(titre, pilote, code, support_document, mise_ajour, souscripteur, destinataires, lieu_du_classement, fpdf) VALUES
   ('XXXXXX', 'pilote', 'ESU', 'papier', '04/09/2023', 'chef de service technique navigation', 'SERVICE TECHNIQUE NAVIGATION', 'ZZZZ','exemplepdf.pdf'),
   ('AAA', 'piloteA', 'PS08', 'Numérique', '04/03/2024', 'chef de service exploitation aeroportuaire', 'SERVICE EXPLOITATION AEROPORTUAIREI', 'ABC','exemplepdf.pdf'),
   ('BBB', 'piloteB', 'ESU', 'Numérique', '04/03/2024', 'chef de service ressources', 'SERVICE RESSOURCES & ACTIVITÉS CONCEDEES', 'ZZ','exemplepdf.pdf'),
   ('ZZZZ', 'pilote', 'PS08', 'papier', '04/03/2024', 'chef de service navigation aerienne', 'SECTION CONTROLE AERIEN', 'ABCD','exemplepdf.pdf'),
   ('XXXXXX', 'pilote', 'ESU', 'papier', '04/03/2024', 'chef de service SSQE', 'SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT', 'ZZZZ','exemplepdf.pdf'),
   ('AAA', 'piloteA', 'PS08', 'Numérique', '04/03/2024', 'chef de service technique navigation', 'SSERVICE TECHNIQUE NAVIGATION', 'ABC','exemplepdf.pdf'),
   ('BBB', 'piloteB', 'ESU', 'Numérique', '04/03/2024', 'chef de service exploitation aeroportuaire', 'SERVICE EXPLOITATION AEROPORTUAIRE', 'ZZ','exemplepdf.pdf'),
   ('ZZZZ', 'pilote', 'PS08', 'papier', '04/03/2024', 'chef de service navigation aerienne', 'SECTION CONTROLE AERIEN', 'ABCD','exemplepdf.pdf'),
   ('ZZZZ', 'pilote', 'PS08', 'papier', '04/03/2024', 'chef de service exploitation aeroportuaire', 'SERVICE EXPLOITATION AEROPORTUAIRE', 'ABCD','exemplepdf.pdf'),
   ('ZZZZ', 'pilote', 'PS08', 'papier', '04/03/2024', 'chef de service technique navigation', 'SERVICE TECHNIQUE NAVIGATION', 'ABCD','exemplepdf.pdf'),
   ('XXXXXX', 'pilote', 'ESU', 'papier', '04/09/2023', 'chef de service gestion de SSQE', 'SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT', 'ZZZZ','exemplepdf.pdf'),
   ('AAA', 'piloteA', 'PS08', 'Numérique', '04/03/2024', 'chef de service gestion de SSQE', 'SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT', 'ABC','exemplepdf.pdf'),
   ('BBB', 'piloteB', 'ESU', 'Numérique', '04/03/2024', 'chef de service exploitation aeroportuaire', 'SERVICE EXPLOITATION AEROPORTUAIRE', 'ZZ','exemplepdf.pdf'),
   ('XXXXXX', 'pilote', 'ESU', 'papier', '04/09/2023', 'chef de service ressources', 'SERVICE RESSOURCES & ACTIVITÉS CONCEDEES', 'ZZZZ','exemplepdf.pdf'),
   ('AAA', 'piloteA', 'PS08', 'Numérique', '04/03/2024', 'chef de service technique navigation', 'SERVICE TECHNIQUE NAVIGATION', 'ABC','exemplepdf.pdf'),
   ('BBB', 'piloteB', 'ESU', 'Numérique', '04/03/2024', 'chef de service exploitation aeroportuaire', 'SERVICE EXPLOITATION AEROPORTUAIRE', 'ZZ','exemplepdf.pdf'),
   ('XXXXXX', 'pilote', 'ESU', 'papier', '04/09/2023', 'chef de service navigation aerienne', 'SECTION CONTROLE AERIEN', 'ZZZZ','exemplepdf.pdf'),
   ('AAA', 'piloteA', 'PS08', 'Numérique', '04/03/2024', 'chef de service gestion de SSQE', 'SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT', 'ABC','exemplepdf.pdf'),
   ('BBB', 'piloteB', 'ESU', 'Numérique', '04/03/2024', 'chef de service ressources', 'SERVICE RESSOURCES & ACTIVITÉS CONCEDEES', 'ZZ','exemplepdf.pdf'),
   ('ZZZZ', 'pilote', 'PS08', 'papier', '04-/03/2024', 'chef de service navigation aerienne', 'SECTION CONTROLE AERIEN', 'ABCD','exemplepdf.pdf');

select * from doc;
select * from utilisateurs;