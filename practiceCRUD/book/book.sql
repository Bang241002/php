create table if not exists `book` (
    `id` int(11) not null AUTO_INCREMENT,
    `name` varchar(100) not null,
    `author` varchar(255) not null,
    `year` int(10) not null,
    primary key (`id`)
    ) engine=InnoDB default charset=utf8 AUTO_INCREMENT =11;

insert into `book` (`id`, `name`, `author`, `year`) values
                                                        (1, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (2, 'Vợ Chồng A phủ', 'Tô Hoài', 1920),
                                                        (3, 'Vợ nhặt', 'Tô hoài', 1941),
                                                        (4, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (5, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (6, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (7, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (8, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (9, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (10, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941),
                                                        (11, 'Dế Mèn phiêu lưu ký', 'Tô hoài', 1941);