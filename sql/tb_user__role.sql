CREATE TABLE kkanov.tb_user__role (
user_id INTEGER,
role_id INTEGER,
PRIMARY KEY(user_id, role_id)
)

INSERT INTO kkanov.tb_user__role(user_id, role_id) VALUES (1, 3);
INSERT INTO kkanov.tb_user__role(user_id, role_id) VALUES (2, 4);