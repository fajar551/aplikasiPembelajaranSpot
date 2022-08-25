create database spot;

use spot;

create table admin (
  idAdmin integer(10) auto_increment primary key,
  username varchar(40) not null,
  password varchar(40) not null
);

create table mapel (
  idMapel varchar(10) primary key,
  namaMapel varchar(40) not null
);

create table kelas (
  idKelas integer(10) auto_increment primary key,
  namaKelas varchar(40) not null
);

create table guru (
  idGuru integer(10) auto_increment primary key,
  idMapel varchar(10) not null,
  NIP varchar(30) not null,
  namaGuru varchar(35) not null,
  password varchar(40) not null,
  noHP varchar(15) not null,
  alamat text not null,
  constraint fk_idMapel foreign key (idMapel) references mapel(idMapel) on delete cascade
);

create table materi (
  idMateri integer(10) auto_increment primary key,
  idGuru integer(10) not null,
  judulFile text not null,
  deskripsi text null,
  lokasiFile text not null,
  constraint fk_idGuru foreign key (idGuru) references guru(idGuru) on delete cascade
);

create table kontrak (
  idKontrak integer(10) auto_increment primary key,
  idKelas integer(10) not null,
  idMapel varchar(10) not null,
  constraint fk_idKelas foreign key (idKelas) references kelas(idKelas) on delete cascade,
  constraint fk_idMapel1 foreign key (idMapel) references mapel(idMapel) on delete cascade
);

create table siswa (
  idSiswa integer(10) auto_increment primary key,
  idKelas integer(10) not null,
  NIS varchar(30) not null,
  namaSiswa varchar(35) not null,
  password varchar(50) not null,
  alamatSiswa text not null,
  constraint fk_idKelas1 foreign key (idKelas) references kelas(idKelas) on delete cascade
);

create table nilai (
  idNilai integer(10) auto_increment primary key,
  idSiswa integer(10) not null,
  idGuru integer(10) not null,
  idKelas integer(10) not null,
  jenis varchar(10) not null,
  nilai integer(4) not null,
  constraint fk_idSiswa foreign key (idSiswa) references siswa(idSiswa) on delete cascade,
  constraint fk_idGuru1 foreign key (idGuru) references guru(idGuru) on delete cascade,
  constraint fk_idKelas3 foreign key (idKelas) references kelas(idKelas) on delete cascade
);
