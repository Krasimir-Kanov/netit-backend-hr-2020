CREATE TABLE kkanov.tm_job_categories(
    id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256)           NOT NULL
);

INSERT INTO kkanov.tm_job_categories(title) VALUES ("Information Technology (IT)");
INSERT INTO kkanov.tm_job_categories(title) VALUES ("Transport, Logistics");
INSERT INTO kkanov.tm_job_categories(title) VALUES ("Sports, Beauty");
INSERT INTO kkanov.tm_job_categories(title) VALUES ("Security");
INSERT INTO kkanov.tm_job_categories(title) VALUES ("Banking");