CREATE TABLE kkanov.tb_job__categories (
    job_offer_id INTEGER,
    category_id  INTEGER,
    PRIMARY KEY (job_offer_id, category_id)
);

INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (1, 1);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (2, 1);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (3, 2);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (4, 2);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (5, 3);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (6, 3);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (7, 4);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (8, 4);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (9, 5);
INSERT INTO kkanov.tb_job__categories(job_offer_id, category_id) VALUES (10, 5);