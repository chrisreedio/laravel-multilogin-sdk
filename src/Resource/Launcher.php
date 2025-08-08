<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Enums\AutomationType;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\BrowserCoreList;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\ConvertQbpToProfile;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\CookieExport;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\CookieImport;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\DeleteBrowserCore;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\GetAllProfilesStatus;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\GetAllQuickProfilesStatus;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\GetProfileStatus;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\GetQbpStatus;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\GetVersion;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\LoadBrowserCore;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\LoadedBrowserCores;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\StartBrowserProfile;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\StartQuickProfile;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\StartQuickProfileV3;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\StopAllProfiles;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\StopBrowserProfile;
use ChrisReedIO\MultiloginSDK\Requests\Launcher\ValidateProxy;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Launcher extends BaseResource
{
    /**
     * @param  ?AutomationType  $automationType  `Optional`. Specify the automation type. Mimic can work with any of the types. Stealthfox can only work with **selenium**. Defaults to `selenium`.
     * @param  ?string  $headlessMode  `Optional`. Enable headless mode for all browsers. Defaults to `false`.
     * @param  ?string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function startBrowserProfile(
        string $folderId,
        string $profileId,
        ?AutomationType $automationType = null,
        ?string $headlessMode = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new StartBrowserProfile($folderId, $profileId, $automationType, $headlessMode, $xStrictMode));
    }

    /**
     * @param  string  $browserType  `Required`. Choose the browser type. Note: For `android` only mimic is supported! Defaults to `mimic`,
     * @param  string  $coreVersion  `Optional`. You can skip specifying the value since your profiles will be updated to the latest core each time it is launched. Defaults to `latest`. Cannot specify the version that is 6 versions older then the current latest one.
     * @param  string  $coreMinorVersion  `Optional`. Specify the minor version based on its availability.
     * @param  string  $osType  `Required`. Specify the OS. Defaults to `windows`.
     * @param  string  $scriptFile  `Optional`
     * @param  string  $automation  `Optional`. `selenium` only for working with Script Runner. Defaults to `selenium`.
     * @param  string  $isHeadless  `Optional`. Enable headless mode. Defaults to `false`.
     * @param  string  $proxy  `Optional` for `parameters`. Add a proxy to your profiles.
     * @param  string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  string  $parameters  `Required`. Specify parameters for your profiles. `flags`, `fingerprints`, `storage` **are required** for **parameters**.
     * @param  string  $flags  `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
     * @param  string  $webrtcMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  string  $geolocationPopup  `Required` for `flags`. Defaults to `prompt`.
     * @param  string  $audioMaskingGraphicsNoise  `Required` for `flags`. Defaults to `mask` for graphic_noise and to `natural` for audio masking.
     * @param  string  $proxyMasking  `Required` for `flags`. Defaults to `disabled` unsell proxy is provided, than defaults to `custom`.
     * @param  string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking  `Required` for `flags`. Defaults to `mask` and for media_devices_masking defaults to `natural`.
     * @param  string  $geolocationMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  string  $canvasNoise  `Optional` for`flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body. Defaults to `mask`.
     * @param  string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`. Defaults to `recover`.
     * @param  string  $fingerprint  `Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`. Defaults to `optional` unless custom is set.
     * @param  string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  string  $osCpu  `Oprtional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  string  $languages  `Required` for `localization`. Pass an empty string.
     * @param  string  $locale  `Required` for `localization`. Pass an empty string.
     * @param  string  $zone  `Required` for `timezone`.  Specify the value for `zone`.
     * @param  string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  string  $publicIp  `Required` for `webrtc`. Specify the value for `public_ip` if the flag is `Custom`.
     * @param  string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`.
     * @param  string  $height  `Required` for `screen`.  Specify the value for `height` if the flag is `Custom`.
     * @param  string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  string  $ports  `Optional`. Specify the value for `ports` if the flag is `Custom`.
     * @param  string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  string  $fonts  `Optional` for `fingerprints`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  string  $cmdParams  `Optional` for `fingerprints`. Specify command line parameters for browsers.
     * @param  string  $customStartUrls  `Optional`. Specify custom URLs. Max amount is 5. Defaults to `optional` unselss custom is set.
     * @param  string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function startQuickProfileV3(
        ?string $browserType = null,
        ?string $coreVersion = null,
        ?string $coreMinorVersion = null,
        ?string $osType = null,
        ?string $scriptFile = null,
        ?string $automation = null,
        ?string $isHeadless = null,
        ?string $proxy = null,
        ?string $saveTraffic = null,
        ?string $parameters = null,
        ?string $flags = null,
        ?string $webrtcMasking = null,
        ?string $geolocationPopup = null,
        ?string $audioMaskingGraphicsNoise = null,
        ?string $proxyMasking = null,
        ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking = null,
        ?string $geolocationMasking = null,
        ?string $canvasNoise = null,
        ?string $startupBehavior = null,
        ?string $fingerprint = null,
        ?string $hardwareConcurrency = null,
        ?string $userAgent = null,
        ?string $platform = null,
        ?string $osCpu = null,
        ?string $acceptLanguages = null,
        ?string $languages = null,
        ?string $locale = null,
        ?string $zone = null,
        ?string $vendor = null,
        ?string $renderer = null,
        ?string $vendorId = null,
        ?string $rendererId = null,
        ?string $publicIp = null,
        ?string $audioOutputs = null,
        ?string $videoInputs = null,
        ?string $audioInputs = null,
        ?string $width = null,
        ?string $height = null,
        ?string $pixelRatio = null,
        ?string $ports = null,
        ?string $accuracy = null,
        ?string $altitude = null,
        ?string $longitude = null,
        ?string $latitude = null,
        ?string $fonts = null,
        ?string $cmdParams = null,
        ?string $customStartUrls = null,
        ?string $maxTouchPoints = null,
        ?string $contentType = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new StartQuickProfileV3($browserType, $coreVersion, $coreMinorVersion, $osType, $scriptFile, $automation, $isHeadless, $proxy, $saveTraffic, $parameters, $flags, $webrtcMasking, $geolocationPopup, $audioMaskingGraphicsNoise, $proxyMasking, $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking, $geolocationMasking, $canvasNoise, $startupBehavior, $fingerprint, $hardwareConcurrency, $userAgent, $platform, $osCpu, $acceptLanguages, $languages, $locale, $zone, $vendor, $renderer, $vendorId, $rendererId, $publicIp, $audioOutputs, $videoInputs, $audioInputs, $width, $height, $pixelRatio, $ports, $accuracy, $altitude, $longitude, $latitude, $fonts, $cmdParams, $customStartUrls, $maxTouchPoints, $contentType, $xStrictMode));
    }

    /**
     * @param  string  $browserType  `Required`. Choose the browser type. Note: For `android` only mimic is supported!
     * @param  string  $autoUpdateCore  `Optional`
     *                                  You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched.
     * @param  string  $coreVersion  `Optional`.
     *                               You can skip specifying the value since your profiles will be updated to the latest core each time it is launched.
     * @param  string  $osType  `Required`. Specify the OS.
     * @param  string  $automation  `Optional`. Specify the automation type. Mimic can work with any of the types. Stealthfox can only work with **selenium**.
     * @param  string  $isHeadless  `Optional`. Enable headless mode.
     * @param  string  $proxy  `Optional` for `parameters`. Add a proxy to your profiles.
     * @param  string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  string  $parameters  `Required`. Specify parameters for your profiles. `flags`, `fingerprints`, `storage` **are required** for **parameters**.
     * @param  string  $flags  `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
     * @param  string  $webrtcMasking  `Required` for `flags`.
     * @param  string  $geolocationPopup  `Required` for `flags`.
     * @param  string  $audioMaskingGraphicsNoise  `Required` for `flags`.
     * @param  string  $proxyMasking  `Required` for `flags`.
     * @param  string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking  `Required` for `flags`.
     * @param  string  $geolocationMasking  `Required` for `flags`.
     * @param  string  $canvasNoise  `Optional` for`flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body.
     * @param  string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`.
     * @param  string  $fingerprint  `Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`.
     * @param  string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  string  $osCpu  `Oprtional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  string  $languages  `Required` for `localization`. Pass an empty string.
     * @param  string  $locale  `Required` for `localization`. Pass an empty string.
     * @param  string  $zone  `Required` for `timezone`.  Specify the value for `zone`.
     * @param  string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  string  $publicIp  `Required` for `webrtc`. Specify the value for `public_ip` if the flag is `Custom`.
     * @param  string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`.
     * @param  string  $height  `Required` for `screen`.  Specify the value for `height` if the flag is `Custom`.
     * @param  string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  string  $ports  `Optional`. Specify the value for `ports` if the flag is `Custom`.
     * @param  string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  string  $fonts  `Optional` for `fingerprints`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  string  $cmdParams  `Optional` for `fingerprints`. Specify command line parameters for browsers.
     * @param  string  $customStartUrls  `Optional`. Specify custom URLs. Max amount is 5.
     * @param  string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     */
    public function startQuickProfile(
        ?string $browserType = null,
        ?string $autoUpdateCore = null,
        ?string $coreVersion = null,
        ?string $osType = null,
        ?string $automation = null,
        ?string $isHeadless = null,
        ?string $proxy = null,
        ?string $saveTraffic = null,
        ?string $parameters = null,
        ?string $flags = null,
        ?string $webrtcMasking = null,
        ?string $geolocationPopup = null,
        ?string $audioMaskingGraphicsNoise = null,
        ?string $proxyMasking = null,
        ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking = null,
        ?string $geolocationMasking = null,
        ?string $canvasNoise = null,
        ?string $startupBehavior = null,
        ?string $fingerprint = null,
        ?string $hardwareConcurrency = null,
        ?string $userAgent = null,
        ?string $platform = null,
        ?string $osCpu = null,
        ?string $acceptLanguages = null,
        ?string $languages = null,
        ?string $locale = null,
        ?string $zone = null,
        ?string $vendor = null,
        ?string $renderer = null,
        ?string $vendorId = null,
        ?string $rendererId = null,
        ?string $publicIp = null,
        ?string $audioOutputs = null,
        ?string $videoInputs = null,
        ?string $audioInputs = null,
        ?string $width = null,
        ?string $height = null,
        ?string $pixelRatio = null,
        ?string $ports = null,
        ?string $accuracy = null,
        ?string $altitude = null,
        ?string $longitude = null,
        ?string $latitude = null,
        ?string $fonts = null,
        ?string $cmdParams = null,
        ?string $customStartUrls = null,
        ?string $maxTouchPoints = null,
        ?string $contentType = null,
    ): Response {
        return $this->connector->send(new StartQuickProfile($browserType, $autoUpdateCore, $coreVersion, $osType, $automation, $isHeadless, $proxy, $saveTraffic, $parameters, $flags, $webrtcMasking, $geolocationPopup, $audioMaskingGraphicsNoise, $proxyMasking, $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking, $geolocationMasking, $canvasNoise, $startupBehavior, $fingerprint, $hardwareConcurrency, $userAgent, $platform, $osCpu, $acceptLanguages, $languages, $locale, $zone, $vendor, $renderer, $vendorId, $rendererId, $publicIp, $audioOutputs, $videoInputs, $audioInputs, $width, $height, $pixelRatio, $ports, $accuracy, $altitude, $longitude, $latitude, $fonts, $cmdParams, $customStartUrls, $maxTouchPoints, $contentType));
    }

    public function stopBrowserProfile(string $profileId): Response
    {
        return $this->connector->send(new StopBrowserProfile($profileId));
    }

    /**
     * @param  string  $type  `Optional`. Specify the type of profile to stop. `all` is set by default.
     */
    public function stopAllProfiles(?string $type = null): Response
    {
        return $this->connector->send(new StopAllProfiles($type));
    }

    public function getVersion(): Response
    {
        return $this->connector->send(new GetVersion);
    }

    public function getProfileStatus(string $profileId): Response
    {
        return $this->connector->send(new GetProfileStatus($profileId));
    }

    public function getAllProfilesStatus(): Response
    {
        return $this->connector->send(new GetAllProfilesStatus);
    }

    public function getAllQuickProfilesStatus(): Response
    {
        return $this->connector->send(new GetAllQuickProfilesStatus);
    }

    public function loadedBrowserCores(): Response
    {
        return $this->connector->send(new LoadedBrowserCores);
    }

    /**
     * @param  mixed  $browserType
     * @param  string  $browserType  Specify the browser type. Defaults to `mimic`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function browserCoreList(
        ?string $browserType = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new BrowserCoreList($browserType, $browserType, $xStrictMode));
    }

    /**
     * @param  string  $browserType  `Required`. Specify the browser type. Defaults to `mimic`
     * @param  string  $version  `Required`. Specify the core version. Defaults to `latest`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function loadBrowserCore(
        ?string $browserType = null,
        ?string $version = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new LoadBrowserCore($browserType, $version, $xStrictMode));
    }

    /**
     * @param  string  $browserType  `Required`. Specify the browser type. Defaults to `mimic`
     * @param  string  $version  `Required`. Specify the core version. Defaults to `latest`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function deleteBrowserCore(
        ?string $browserType = null,
        ?string $version = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new DeleteBrowserCore($browserType, $version, $xStrictMode));
    }

    /**
     * @param  string  $type  `Required`. Specify the proxy type. Defaults to `http`.
     * @param  string  $host  `Required`. Specify the proxy host.
     * @param  string  $port  `Required`. Specify the proxy port.
     * @param  string  $username  `Required`. Specify the proxy username.
     * @param  string  $password  `Required`. Specify the proxy password.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function validateProxy(
        ?string $type = null,
        ?string $host = null,
        ?string $port = null,
        ?string $username = null,
        ?string $password = null,
        ?string $contentType = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ValidateProxy($type, $host, $port, $username, $password, $contentType, $xStrictMode));
    }

    /**
     * @param  string  $profileId  `Required`
     * @param  string  $folderId  `Required`. Defaults to `default profile ID`
     * @param  string  $importAdvancedCookies  `Required`. Set `true` if you want to imported the created cookies.
     * @param  string  $cookies  `Optional`. Only add this if you are using `import_advanced_cookies` to `false`
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function cookieImport(
        ?string $profileId = null,
        ?string $folderId = null,
        ?string $importAdvancedCookies = null,
        ?string $cookies = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new CookieImport($profileId, $folderId, $importAdvancedCookies, $cookies, $xStrictMode));
    }

    /**
     * @param  mixed  $profileId
     * @param  mixed  $folderId
     * @param  string  $profileId  `Required`
     * @param  string  $folderId  `Required`
     */
    public function cookieExport(?string $profileId = null, ?string $folderId = null): Response
    {
        return $this->connector->send(new CookieExport($profileId, $folderId, $profileId, $folderId));
    }

    public function convertQbpToProfile(mixed $data = null): Response
    {
        return $this->connector->send(new ConvertQbpToProfile($data));
    }

    public function getQbpStatus(): Response
    {
        return $this->connector->send(new GetQbpStatus);
    }
}
