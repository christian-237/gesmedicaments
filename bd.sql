-- Création de la table "produit"
CREATE TABLE produit (
  idProd int auto_increment primary key,
  codeProd text,
  nomProd text,
  description text,
  image text,
  poid float,
  prixU int,
  prixV int,
  dateAjout datetime,
  dateModif datetime,
  idUser int,
  etat ENUM('active', 'supprimer') NOT NULL DEFAULT 'active' AFTER dateModif
);

-- Création de la table "user"
CREATE TABLE user (
  idU int auto_increment primary key,
  nom text,
  prenom text,
  login text,
  password text,
  telephone varchar(20),
  idRole int,
  dateAjout datetime,
  dateModif datetime
);

INSERT INTO user (nom, prenom, login, password, telephone, idRole, dateAjout, dateModif)
VALUES
  ('kom', 'christ', 'kom', 'kom123', '1234567890', 1, NOW(), NOW()),
  ('Smith', 'Jane', 'janesmith', 'password2', '9876543210', 2, NOW(), NOW()),
  ('Johnson', 'Michael', 'michaeljohnson', 'password3', '5555555555', 1, NOW(), NOW()),
  ('Williams', 'Emily', 'emilywilliams', 'password4', '1111111111', 3, NOW(), NOW()),
  ('Brown', 'Oliver', 'oliverbrown', 'password5', '9999999999', 2, NOW(), NOW()),
  ('Taylor', 'Sophia', 'sophiataylor', 'password6', '7777777777', 1, NOW(), NOW()),
  ('Anderson', 'Ava', 'avaanderson', 'password7', '2222222222', 3, NOW(), NOW()),
  ('Miller', 'Liam', 'liammiller', 'password8', '8888888888', 2, NOW(), NOW()),
  ('Clark', 'Mia', 'miaclark', 'password9', '4444444444', 1, NOW(), NOW()),
  ('Wilson', 'Noah', 'noahwilson', 'password10', '6666666666', 3, NOW(), NOW());