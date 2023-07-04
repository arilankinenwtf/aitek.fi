# aitek.fi
- nimi @ wwwXX.zoner.fi
- ConcreteCMS v.9.2.0
- PHP 8.2
- MariaDB 10.3.32

## Lokaali kehitysympäristö
- `git clone --recursive git@github.com:WTF-Design/domain.fi.git`
- lisää oma SSH-avain palvelimelle (https://wwwXX.zoner.fi:2222 -> Login as user -> SSH keys -> Paste Authorized Key)
- luo .env tiedosto (Enpassista sisältö)
- `composer install` (tai `lando composer install` jos ei toimi)
- `lando start`
- `lando pull-start` hakee tietokannan ja tiedostot, kestää hetken
- sivusto löytyy sitten osoitteella `******.lndo.site` (jos ei toimi, käytä landon ehdottamaa localhost-osoitetta, löytyy `lando info` komennolla)

## Muutosten hakeminen palvelimelta
- `lando pull-db` hakee tietokannan
- `lando pull-files` hakee application/files/ kansion kuvat ym.
- `lando pull-application` hakee koko application kansion

## Versionhallinta
### Branchit
- Kun aloitat rakentamaan uutta toimintoa, tee tarvittaessa uusi branchi. (voi käyttää myös pelkkää main-branchia jos kehittää yksin tai jos on pieniä muutoksia) 
- Uuden branchin luominen: `git branch branchin-nimi`
- Olemassa olevaan branchiin siirtyminen: `git checkout branchin-nimi`
- Näytä kaikki branchit: `git branch`
- HUOM, älä tee muutoksia suoraan production-nimiseen branchiin

## Muutosten julkaisu

### Pull request production <- main
- Productioniin puskeminen onnistuu ainoastaan pull requestin kautta production branchiin (mergeä aina ensin mainiin, jos käytit brancheja). Eli kun production branchiin tehdään pull requestin mergeaminen onnistuneesti, niin workflow vie *application* kansion tiedostoihin tehdyt muutokset automaattisesti serverille (lukuunottamatta bootstrap-, languages- ja config-kansioita).
(Githubissa täytyy olla määritelty secretit SSH_PRIVATE_KEY, REMOTE_HOST, REMOTE_USER ja TARGET sekä SSH publickey vietynä palvelimelle)

### Push staging
- Staging sivustoon muutosten vieminen onnistuu pushaamalla suoraan staging branchiin. Muista mergetä muutokset mainiin. *Application* kansion muutokset viedään staging sivulle jokaisella pushilla (HUOM Staging sivusto täytyy olla ensin olemassa ja secretit pitää määritellä Githubissa: SSH_PRIVATE_KEY_STAGING, REMOTE_HOST_STAGING, REMOTE_USER_STAGING ja TARGET_STAGING sekä SSH publickey viedä palvelimelle).

## Ongelmatilanteita?
- Lisäsitkö .env tietoja jälkeenpäin? Muista ajaa sen jälkeen `lando rebuild -y`

## Lando/Docker komentoja:
- `lando info` -> näkee lando projektin tietoja
- `lando list` -> näkee käynnissä olevat lando kontainerit
- `lando logs` -> näkee logit, mm. tietokanta errorit
- `lando start`
- `lando restart`
- `lando rebuild`
- `lando stop`
- `lando poweroff` -> sammuttaa landon kaikista koneella olevista projekteista
- `lando import-db dump.sql.gz` -> importtaa tietokanta tiedostosta
- `lando db-export dump.sql` -> exporttaa tietokanta tiedostoon

*Outoihin lando/docker ongelmiin voi kokeilla tätä:*
- `lando poweroff` -> sammuta lando
- `docker container rm landoproxyhyperion5000gandalfedition_proxy_1` -> tuo containeri saattaa jäädä joskus jumiin, täytyy silloin poistaa
- `lando rebuild -y` -> rebuildaa lando projektin
- joskus myös `docker network prune` auttaa tyhjentämällä turhat networkit