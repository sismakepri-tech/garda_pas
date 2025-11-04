CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);

INSERT INTO migrations VALUES(7,'2025_11_01_153010_create_o_d_o_r_s_table',1);
