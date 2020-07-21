DROP FUNCTION task_domain(INT, VARCHAR(255), NUMERIC(10,2), VARCHAR(255));

CREATE FUNCTION task_domain(INT, VARCHAR(255), NUMERIC(10,2), VARCHAR(255)) RETURNS VOID AS $$
DECLARE
    id_task ALIAS FOR $1;
    dom ALIAS FOR $2;
    vis ALIAS FOR $3;
    self_page ALIAS FOR $4;
    id_domain INT;
    id_page INT;
BEGIN
    SELECT id INTO id_domain FROM domain WHERE domain=dom LIMIT 1;
    SELECT id INTO id_page FROM page p WHERE p.page=self_page AND p.task_id=id_task LIMIT 1;
    BEGIN
        INSERT INTO task_domain (task_id, domain_id) VALUES (id_task,id_domain);
    EXCEPTION WHEN UNIQUE_VIOLATION THEN
        -- просто ловим исключение
    END;
    BEGIN
        INSERT INTO top_domains (id, page_id, domain_id, visible) VALUES (nextval('top_domains_id_seq'),id_page, id_domain, vis);
    EXCEPTION WHEN UNIQUE_VIOLATION THEN
        -- просто ловим исключение
    END;
END;
$$ LANGUAGE plpgsql;