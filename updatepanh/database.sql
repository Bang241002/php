CREATE TABLE gallery (
                         idGalery int(11) AUTO_INCREMENT Primary key not null,
                         titleGalery LONGTEXT not null,
                         descGallery LONGTEXT not null,
                         imgFullNameGallery LONGTEXT not null,
                         orderGallery int(11) not null
);