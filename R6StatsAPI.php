<?php

/**
 * R6StatsAPI
 * @author yurisi
 * @link https://homepage.yurisi.space/
 */

class R6StatsAPI {


    const APIKEY="";//R6StatsAPIKey here

    const SEASON="shadow_legacy";

    const LOCATION="apac";//ncsa(US),emea(Europe),apac(ASIA)

    const INFO=["generic","seasonal","operators","weapon-categories","weapons"];


    /**
     * @var array
     */
    private $stats=[];


    /**
     * R6SstatsAPI constructor.
     * @param string $name
     * @param string $platform
     */
    public function __construct(string $name,string $platform="pc") {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api2.r6stats.com/public-api/stats/' . $name . '/' . $platform . '/' . self::INFO[0]);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . self::APIKEY));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $this->stats[self::INFO[0]] = json_decode(curl_exec($curl), true);
        curl_close($curl);

        //var_dump($this->stats);
        if (isset($this->stats["generic"]["status"])) {
            throw new \RuntimeException("The user name has no data");
        }
    }

    /**
     * @param string $stats
     */
    private function getStats(string $stats){
        if(!isset($this->stats[$stats])) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api2.r6stats.com/public-api/stats/' . $this->getUserName() . '/' . $this->getPlatform() . '/' . $stats);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . self::APIKEY));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            //var_dump(curl_exec($curl));
            $this->stats[$stats] = json_decode(curl_exec($curl), true);
            curl_close($curl);
        }
    }


    /**
     * @return string
     */
    public function getUserName(){
        return $this->stats["generic"]["username"];
    }

    /**
     * @return string
     */
    public function getPlatform(){
        return $this->stats["generic"]["platform"];
    }

    /**
     * @return string
     */
    public function getUPlayId(){
        return $this->stats["generic"]["uplay_id"];
    }

    /**
     * @return array
     */
    public function getAliasesList(){
        return $this->stats["generic"]["aliases"];
    }

    /**
     * @return int
     */
    public function getUserLevel(){
        return $this->stats["generic"]["progression"]["level"];
    }

    /**
     * @return int
     */
    public function getLootboxProbability(){
        return $this->stats["generic"]["progression"]["lootbox_probability"];
    }

    /**
     * @return int
     */
    public function getTotalXp(){
        return $this->stats["generic"]["progression"]["total_xp"];
    }

    /*
     * all match stats
     */
    /**
     * @return int
     */
    public function getAllAssists(){
        return $this->stats["generic"]["stats"]["general"]["assists"];
    }

    /**
     * @return int
     */
    public function getAllBarricadesDeployed(){
        return $this->stats["generic"]["stats"]["general"]["barricades_deployed"];
    }

    /**
     * @return int
     */
    public function getAllBlindKills(){
        return $this->stats["generic"]["stats"]["general"]["blind_kills"];
    }

    /**
     * @return int
     */
    public function getAllBulletsHit(){
        return $this->stats["generic"]["stats"]["general"]["bullets_hit"];
    }

    /**
     * get Down But Not Out
     * @return int
     */
    public function getAllDBNOs(){
        return $this->stats["generic"]["stats"]["general"]["dbnos"];
    }

    /**
     * @return int
     */
    public function getAllKills(){
        return $this->stats["generic"]["stats"]["general"]["kill"];
    }

    /**
     * @return int
     */
    public function getAllDeaths(){
        return $this->stats["generic"]["stats"]["general"]["death"];
    }

    /**
     * @return float
     */
    public function getAllKillDeathRatio(){
        return $this->stats["generic"]["stats"]["general"]["kd"];
    }

    /**
     * @return int
     */
    public function getAllDistanceTravelled(){
        return $this->stats["generic"]["stats"]["general"]["distance_travelled"];
    }

    /**
     * @return int
     */
    public function getAllDraws(){
        return $this->stats["generic"]["stats"]["general"]["draws"];
    }

    /**
     * @return int
     */
    public function getAllGadgetsDestroyed(){
        return $this->stats["generic"]["stats"]["general"]["gadgets_destroyed"];
    }

    /**
     * @return int
     */
    public function getAllGamesPlayedCount(){
        return $this->stats["generic"]["stats"]["general"]["games_played"];
    }

    /**
     * @return int
     */
    public function getAllHeadShots(){
        return $this->stats["generic"]["stats"]["general"]["headshots"];
    }

    /**
     * @return int
     */
    public function getAllWins(){
        return $this->stats["generic"]["stats"]["general"]["wins"];
    }

    /**
     * @return int
     */
    public function getAllLosses(){
        return $this->stats["generic"]["stats"]["general"]["losses"];
    }

    /**
     * @return float
     */
    public function getAllWinLoseRatio(){
        return $this->stats["generic"]["stats"]["general"]["wl"];
    }

    /**
     * knife hummer kills
     * @return int
     */
    public function getAllMeleeKills(){
        return $this->stats["generic"]["stats"]["general"]["melee_kills"];
    }

    /**
     * @return int
     */
    public function getAllPenetrationKills(){
        return $this->stats["generic"]["stats"]["general"]["penetration_kills"];
    }

    /**
     * @return int
     */
    public function getAllPlaytime(){
        return $this->stats["generic"]["stats"]["general"]["playtime"];
    }

    /**
     * @return int
     */
    public function getAllReinforcementsDeployed(){
        return $this->stats["generic"]["stats"]["general"]["reinforcements_deployed"];
    }

    /**
     * @return int
     */
    public function getAllRevives(){
        return $this->stats["generic"]["stats"]["general"]["revives"];
    }

    /**
     * @return int
     */
    public function getAllSuicides(){
        return $this->stats["generic"]["stats"]["general"]["suicides"];
    }


    /*
     * casual stats
     */
    /**
     * @return int
     */
    public function getCasualKills(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["kills"];
    }

    /**
     * @return int
     */
    public function getCasualDeaths(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["deaths"];
    }

    /**
     * @return float
     */
    public function getCasualKillDeathRatio(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["kd"];
    }

    /**
     * @return int
     */
    public function getCasualWins(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["wins"];
    }

    /**
     * @return int
     */
    public function getCasualLosses(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["kills"];
    }

    /**
     * @return float
     */
    public function getCasualWinLoseRatio(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["wl"];
    }

    /**
     * @return int
     */
    public function getCasualPlayTime(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["playtime"];
    }

    /**
     * @return int
     */
    public function getCasualGamesPlayedCount(){
        return $this->stats["generic"]["stats"]["queue"]["casual"]["games_played"];
    }

    /*
     * ranked match stats
     */
    /**
     * @return int
     */
    public function getRankedKills(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["kills"];
    }

    /**
     * @return int
     */
    public function getRankedDeaths(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["deaths"];
    }

    /**
     * @return float
     */
    public function getRankedKillDeathRatio(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["kd"];
    }

    /**
     * @return int
     */
    public function getRankedWins(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["wins"];
    }

    /**
     * @return int
     */
    public function getRankedLosses(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["losses"];
    }

    /**
     * @return float
     */
    public function getRankedWinLoseRatio(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["wl"];
    }

    /**
     * @return int
     */
    public function getRankedDraws(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["kills"];
    }

    /**
     * @return int
     */
    public function getRankedPlayTime(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["playtime"];
    }

    /**
     * @return int
     */
    public function getRankedGamesPlayedCount(){
        return $this->stats["generic"]["stats"]["queue"]["ranked"]["games_played"];
    }

    /*
     * other match stats
     */
    /**
     * @return int
     */
    public function getOtherKills(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["kills"];
    }

    /**
     * @return int
     */
    public function getOtherDeaths(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["deaths"];
    }

    /**
     * @return float
     */
    public function getOtherKillDeathRatio(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["kd"];
    }

    /**
     * @return int
     */
    public function getOtherWins(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["wins"];
    }

    /**
     * @return int
     */
    public function getOtherLosses(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["losses"];
    }

    /**
     * @return float
     */
    public function getOtherWinLoseRatio(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["wl"];
    }

    /**
     * @return int
     */
    public function getOtherDraws(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["draws"];
    }

    /**
     * @return int
     */
    public function getOtherPlayTime(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["playtime"];
    }

    /**
     * @return int
     */
    public function getOtherGamesPlayedCount(){
        return $this->stats["generic"]["stats"]["queue"]["other"]["games_played"];
    }

    /*
     * ToDo:Gamemode
     */

    public function getLatestMMR(){
        $this->getStats(self::INFO[1]);
        $this->stats[self::INFO[1]]["seasons"][self::SEASON]["regions"][self::LOCATION]["mmr"];
    }

}