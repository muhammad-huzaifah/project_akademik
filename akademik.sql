create table tabel_agama
(
    kd_agama   varchar(2)  not null
        primary key,
    nama_agama varchar(30) not null
);

create table tabel_guru
(
    id_guru       int auto_increment
        primary key,
    nuptk         varchar(16)     not null,
    nama_guru     varchar(30)     not null,
    jenis_kelamin enum ('P', 'W') not null
);

create table tabel_jenjang_sekolah
(
    id_jenjang   int auto_increment
        primary key,
    nama_jenjang varchar(10) not null,
    jumlah_kelas int         null
);

create table tabel_jurusan
(
    kd_jurusan   varchar(4)  not null
        primary key,
    nama_jurusan varchar(30) not null
);

create table tabel_kurikulum
(
    id_kurikulum   int auto_increment
        primary key,
    nama_kurikulum varchar(30)     not null,
    is_aktif       enum ('Y', 'N') null
);

create table tabel_mapel
(
    kd_mapel   varchar(4)  not null
        primary key,
    nama_mapel varchar(30) not null
);

create table tabel_kurikulum_detail
(
    id_kurikulum_detail int auto_increment
        primary key,
    id_kurikulum        int         not null,
    kd_mapel            varchar(11) not null,
    kd_jurusan          varchar(4)  not null,
    kelas               int         null,
    constraint tabel_kurikulum_detail_ibfk_1
        foreign key (id_kurikulum) references tabel_kurikulum (id_kurikulum),
    constraint tabel_kurikulum_detail_ibfk_2
        foreign key (kd_mapel) references tabel_mapel (kd_mapel),
    constraint tabel_kurikulum_detail_ibfk_3
        foreign key (kd_jurusan) references tabel_jurusan (kd_jurusan)
);

create index id_kurikulum
    on tabel_kurikulum_detail (id_kurikulum);

create index kd_jurusan
    on tabel_kurikulum_detail (kd_jurusan);

create index kd_mapel
    on tabel_kurikulum_detail (kd_mapel);

create table tabel_menu
(
    id           int         not null
        primary key,
    nama_menu    varchar(50) not null,
    link         varchar(50) not null,
    icon         varchar(30) not null,
    is_main_menu int         not null
)
    charset = latin1;

create table tabel_ruangan
(
    kd_ruangan   varchar(4)  not null
        primary key,
    nama_ruangan varchar(30) not null
);

create table tabel_siswa
(
    nim           varchar(11)     not null
        primary key,
    nama          varchar(40)     null,
    gender        enum ('P', 'W') null,
    tanggal_lahir date            null,
    tempat_lahir  varchar(30)     null,
    kd_agama      varchar(2)      not null,
    foto          text            null,
    constraint tabel_siswa_ibfk_1
        foreign key (kd_agama) references tabel_agama (kd_agama)
);

create index foreign_key_name
    on tabel_siswa (kd_agama);

create table tabel_tahun_akademik
(
    id_tahun_akademik int(4) auto_increment
        primary key,
    tahun_akademik    varchar(10)     not null,
    is_aktif          enum ('Y', 'N') null
);

create table table_sekolah_info
(
    id_sekolah         int         not null
        primary key,
    nama_sekolah       varchar(30) not null,
    id_jenjang_sekolah int         not null,
    alamat_sekolah     text        null,
    email              varchar(30) null,
    Telepon            varchar(12) null,
    constraint table_sekolah_info_ibfk_1
        foreign key (id_jenjang_sekolah) references tabel_jenjang_sekolah (id_jenjang)
);

create index id_jenjang_sekolah
    on table_sekolah_info (id_jenjang_sekolah);


