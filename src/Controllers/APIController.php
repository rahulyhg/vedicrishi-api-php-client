<?php

/**
 *  The public controller class for consuming Vedic Rishi Astro API
 *
 */

require_once '../APIException.php';
require_once '../APIHelper.php';
require_once '../Configuration.php';
require_once '../../vendor/src/Unirest.php';

class APIController {

    /* private fields for configuration */

    /**
     * The username to use with basic authentication
     * @var string
     */
    private $basicAuthUserName;
    /**
     * The password to use with basic authentication
     * @var string
     */
    private $basicAuthPassword;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($basicAuthUserName, $basicAuthPassword)
    {
        $this->basicAuthUserName = $basicAuthUserName ? $basicAuthUserName : Configuration::$basicAuthUserName;
        $this->basicAuthPassword = $basicAuthPassword ? $basicAuthPassword : Configuration::$basicAuthPassword;
    }

    /**
     * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found */
    private function val($arr, $key, $default = NULL)
    {
        return isset($arr[$key]) ? $arr[$key] : $default;
    }


    private function getHeaders()
    {
        return array (
            'user-agent'                         => 'kundli.io 0.1',
            'Accept'                             => 'application/json',
            'content-type'                       => 'application/json; charset=utf-8'
        );
    }

    /**
     * This api provides complete panchang in details at the time of sunrise for given date.
     * @param  mixed     $jSONRequestForPanchangAtSunrise          Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getAdvancedPanchangAtTheTimeOfSunrise ($jSONRequestForPanchangAtSunrise)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/advanced_panchang/sunrise';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchangAtSunrise), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Ashtakoot details provides complete ashtakoot analysis .
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getAshtakootDetails ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_ashtakoot_points/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides the complete avakahada details e.g. nakshtatra, charan, tithi, karan, yog ,varna, vashaya, yoni, etc
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getBasicAstrologicalDetails($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/astro_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * This api suggest you your "Life Stone , Lucky Stone ,Benefic Stone" with their deity,wearing finger,date,time,weight of stone etc.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getBasicGemstoneSuggestion ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/basic_gem_suggestion/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides data points for panchang elements, and sunrise and set timings.
     * @param  mixed     $jSONRequestForPanchang        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getBasicPanchangDetails ($jSONRequestForPanchang)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/basic_panchang/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchang), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides data points for panchang elements, chaugadiya and sunrise and set time at he time of  sunrise.
     * @param  mixed     $jSONRequestForPanchangAtSunrise          Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getBasicPanchangDetailsAtTheTimeOfSunrise ($jSONRequestForPanchangAtSunrise)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/basic_panchang/sunrise/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchangAtSunrise), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Along with birth details it provides sunrise, sunset, ayanamsha as well.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getBirthDetails ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/birth_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Advanced panchang provides complete panchang in details.
     * @param  mixed     $jSONRequestForPanchang        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getCompletePanchangDetails ($jSONRequestForPanchang)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/advanced_panchang/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchang), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Current vimshottari dasha gives currently undergoing dasha of your horoscope.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getCurrentVimshottariDasha ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/current_vdasha/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Gives fasts report.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getFastsReport ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_fasts_report/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Suggest favourable lord for you.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getFavourableLord ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_fav_lord/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Gives favourable mantra for you.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getFavourableMantra ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_fav_mantra/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Gives favourable time.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getFavourableTime ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_fav_time/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Calculates complete general house reports.
     * @param  array  $options    Array with all options for search
     * @param  string     $options['planetName']            Required parameter: Gives house report for sun ,same way you can get the details of moon, mars, mercury, jupiter, venus and saturn
     * @param  mixed      $options['jSONRequestData']       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getGeneralHouseReport ($options, $jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/general_house_report/{planet_name}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'planet_name'       => $this->val($options, 'planetName'),
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Calculates complete general rashi reports.
     * @param  array  $options    Array with all options for search
     * @param  string     $options['planetName']            Required parameter: Gives moon sign report same way you can get mars, mercury, jupiter, venus, saturn sign report.
     * @param  mixed      $options['jSONRequestData']       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getGeneralRashiReport ($options, $jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/general_rashi_report/{planet_name}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'planet_name'       => $this->val($options, 'planetName'),
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Full planetary positions including ascendant along with retrograde status and nakshatra, house, sign and their specific lordships.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getGetPlanetaryPositions ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/planets/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * chart_id is based on chart type(all D-charts) - The data points include various planetary positions along with ascendant and their respective house positions to draw horoscope charts.
     * @param  array  $options    Array with all options for search
     * @param  string     $options['chartId']               Required parameter: D1 as chart_id provides birth chart or ascendant chart or lagna chart .Same way SUN : For Sun Chart, MOON : For Moon Chart, D2 : For Hora Chart, D3 : For Dreshkan Chart, D4 : For Chathurthamasha Chart, D5 : For Panchmansha Chart, D7 : For Saptamansha Chart, D8 : For Ashtamansha Chart, D9 : For Navamansha Chart, D10 : For Dashamansha Chart, D12 : For Dwadashamsha chart, D16 : For Shodashamsha Chart, D20 : For Vishamansha Chart, D24 : For Chaturvimshamsha Chart, D27 : For Bhamsha Chart, D30 : For Trishamansha Chart, D40 : For Khavedamsha Chart, D45 : For Akshvedansha Chart, D60 : For Shashtymsha Chart
     * @param  mixed      $options['jSONRequestData']       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getHoroscopeCharts ($options, $jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/horo_chart/{chart_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'chart_id'          => $this->val($options, 'chartId'),
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Calculate Kal Sarpa Dosha report.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getKalsarpaDoshaReport ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/kalsarpa_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Major vimshottari dasha provides complete mahadasha detail.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMajorVimshottariDashaDetails ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/major_vdasha/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Calculate if Manglik Dosha present or not .
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getManglikReport ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/manglik/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Match making report gives matching report based on male and female horoscope.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchMakingReport ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_making_report/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Match manglik reports gives you manglik report for male and female horoscopes.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchManglikReport ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_manglik_report/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides matching astrological details like, varna, vashya,maitri,nadi,gan etc.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchingAstrologyDetails ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_astro_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Gives birth details of both male and femaile horoscope.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchingBirthDetails($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_birth_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Matching Obstruction provide whether matching have obstruction or not.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchingObstruction ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_obstructions/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides both male and female planetary position details of their corresponding horoscopes.
     * @param  mixed     $jSONRequestForMatchMaking         Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getMatchingPlanetaryDetails ($jSONRequestForMatchMaking)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/match_planet_details/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForMatchMaking), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides detailed Numerology report.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getNumerologyBasicDetails ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_table/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides Numerology report.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getNumerologyReport ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_report/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Give place and vastu.
     * @param  mixed     $jSONRequestForNumerology        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getPlaceAndVastu ($jSONRequestForNumerology)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/numero_place_vastu/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForNumerology), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides panchang planetary degrees and retrograde positions of panchang at the time of given day sunrise
     * @param  mixed     $jSONRequestForPanchangAtSunrise          Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getPlanetPanchangDetailsAtTheTimeOfSunrise ($jSONRequestForPanchangAtSunrise)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/planet_panchang/sunrise/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchangAtSunrise), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Provides panchang planetary degrees and retrograde positions
     * @param  mixed     $jSONRequestForPanchang        Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getPlanetaryPanchangDetails ($jSONRequestForPanchang)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/planet_panchang/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestForPanchang), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

    /**
     * Recommends suitable rudraksha.
     * @param  mixed     $jSONRequestData       Required parameter: The details in below format is required to be sent in JSON format for making an API request.
     * @return mixed response from the API call*/
    public function getRudrakshaSuggestion ($jSONRequestData)
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;

        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/rudraksha_suggestion/';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = $this->getHeaders();

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($jSONRequestData), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }

}