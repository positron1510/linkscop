DROP FUNCTION find_one_project(INT);

CREATE FUNCTION find_one_project(INT) RETURNS TABLE(task_name VARCHAR(255), top VARCHAR(255), region VARCHAR(255), pages VARCHAR[],
    phrases VARCHAR[], domains VARCHAR[]) AS $$
DECLARE
    id_task ALIAS FOR $1;
    rec RECORD;
    r RECORD;
    task_name VARCHAR(255) := '';
    top VARCHAR(255) := '';
    region VARCHAR(255) := '';
    pages VARCHAR[] := ARRAY[''];
    one_page VARCHAR[] := ARRAY[''];
    one_phrase VARCHAR[] := ARRAY[''];
    phrases VARCHAR[] := ARRAY[''];
    domains VARCHAR[] := ARRAY[''];
    one_domain VARCHAR[] := ARRAY[''];
    all_phrases VARCHAR[] := ARRAY[''];
    all_domains VARCHAR[] := ARRAY[''];
    counter INT := 1;
    cnt INT := 1;
BEGIN
    FOR rec IN SELECT t.name AS task_name, top.name AS top, reg.name AS region FROM task t INNER JOIN top ON t.top_id = top.id
        INNER JOIN region reg ON t.region_id=reg.id WHERE t.id=id_task LIMIT 1 LOOP
        task_name := rec.task_name;
        top := rec.top;
        region := rec.region;
    END LOOP;
    FOR rec IN SELECT id,page FROM page WHERE task_id=id_task LOOP
        one_page[1] := rec.page;
        one_page[2] := rec.id;

        FOR r IN SELECT ph.phrase,ph.wordstat FROM page p INNER JOIN page_phrase pph ON p.id = pph.page_id
            INNER JOIN phrase ph ON ph.id = pph.phrase_id WHERE p.task_id=id_task AND p.id=rec.id LOOP
            one_phrase[1] := r.phrase;
            one_phrase[2] := cast(r.wordstat AS VARCHAR);
            one_phrase[3] := cast(rec.id AS VARCHAR);
            phrases[cnt] := one_phrase;
            one_phrase := ARRAY[''];
            cnt := cnt + 1;
        END LOOP;

        cnt := 1;

        FOR r IN SELECT d.domain,d.domains,d.hrefs,top_d.visible,d.is_www FROM domain d INNER JOIN task_domain td ON d.id = td.domain_id INNER JOIN
            top_domains top_d ON td.domain_id = top_d.domain_id WHERE td.task_id=id_task AND top_d.page_id=rec.id LOOP
            one_domain[1] := r.domain;
            one_domain[2] := cast(r.domains AS VARCHAR);
            one_domain[3] := cast(r.hrefs AS VARCHAR);
            one_domain[4] := cast(r.visible AS VARCHAR);
            one_domain[5] := cast(r.is_www AS VARCHAR);
            one_domain[6] := cast(rec.id AS VARCHAR);
            domains[cnt] := one_domain;
            one_domain := ARRAY[''];
            cnt := cnt + 1;
        END LOOP;

        pages[counter] := one_page;
        all_phrases[counter] := phrases;
        all_domains[counter] := domains;

        phrases := ARRAY[''];
        one_phrase := ARRAY[''];
        domains := ARRAY[''];
        one_domain := ARRAY[''];
        cnt := 1;
        counter := counter + 1;
    END LOOP;
    RETURN QUERY SELECT task_name, top, region, pages, all_phrases, all_domains;
END;
$$ LANGUAGE plpgsql;