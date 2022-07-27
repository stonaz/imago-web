SELECT fondi.fondo, uffici.ufficio, notai_uffici.cognome, notai_uffici.nome, notai_uffici.successione, notai_uffici.periodo, notai_uffici.funzione, notai_uffici."data inizio", notai_uffici."data fine"
FROM fondi INNER JOIN (uffici INNER JOIN notai_uffici ON (uffici.ufficio = notai_uffici.ufficio) AND (uffici.fondo = notai_uffici.fondo)) ON fondi.fondo = uffici.fondo
ORDER BY fondi."ordine fondi", uffici."ordine uffici", notai_uffici.successione, notai_uffici."data inizio";