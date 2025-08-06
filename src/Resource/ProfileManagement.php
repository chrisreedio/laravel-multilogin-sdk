<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileClone;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileConvert;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileCreate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileMetas;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileMove;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfilePartialUpdate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileRemove;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileRestore;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileSearch;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileSummary;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileUpdate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ScreenResolution;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ProfileManagement extends BaseResource
{
    /**
     * @param  string  $name  `Required`. Name your profiles.
     * @param  string  $browserType  `Required`. Choose the browser type. Note: For `android` only mimic is supported! Defaults to `mimic`.
     * @param  string  $folderId  `Required`.
     *                            Specify the folder in which profiles will be created. The ID can be retrived with `GET /workspace/folders.`
     * @param  string  $osType  `Required`. Specify the OS. Defaults to `windows`.
     * @param  string  $coreVersion  `Optional`.
     *                               You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched. Cannot specify the version that is 6 versions older then the current latest one.
     * @param  string  $coreMinorVersion  `Optional`. Specify the minor version based on its availability.
     * @param  string  $autoUpdateCore  `Optional`
     *                                  You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched. Defaults to `true`.
     * @param  string  $tags  `Optional`. Specify tags. Max number is 10.
     * @param  string  $times  `Optional`.
     *                         Specify a number of profiles to create. Defaults to `1`.
     * @param  string  $notes  `Optional`. Add notes to your profiles. Defaults to an empty string`""`
     * @param  string  $parameters  `Required`. Specify parameters for your profiles. `flags`, `fingerprint`, `storage` **are required** for **parameters**.
     * @param  string  $flags  `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
     * @param  string  $webrtcMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  string  $audioMaskingGraphicsNoisePortsMasking  `Required` for `flags`. Defaults to `natural` for audio_masking and `mask` for rest.
     * @param  string  $proxyMasking  `Required` for `flags`. Defaults to `disabled` unless proxy is configured, than defaults to `custom`.
     * @param  string  $geolocationPopup  `Required` for `flags`. Defaults to `prompt`.
     * @param  string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking  `Required` for `flags`. Defaults to `mask` and for media_devices_masking defaults to `natural`.
     * @param  string  $geolocationMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  string  $quicMode  `Optional` for `flags`. `disabled` by default.
     * @param  string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`. Defaults to `recover`.
     * @param  string  $canvasNoise  `Optional` for `flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body.
     * @param  string  $fingerprint  In Strict mode is`Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`. Defaults to `optional` unless custom is set.
     * @param  string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  string  $osCpu  `Optional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  string  $languages  `Required` for `localization`.
     * @param  string  $locale  `Required` for `localization`.
     * @param  string  $zone  `Required` for `timezone` Specify the value for `zone`.
     * @param  string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $publicIp  `Required` for `webrtc`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`. The Screen Resolution endpoint is found under Profile Management->[Screen Resolution](https://documenter.getpostman.com/view/28533318/2s946h9Cv9#5a8d793b-3cd0-4ae3-a3f6-caa9143315c2)
     * @param  string  $height  `Required` for `screen`. Specify the value for `height` if the flag is `Custom`. The Screen Resolution endpoint is found under Profile Management->[Screen Resolution](https://documenter.getpostman.com/view/28533318/2s946h9Cv9#5a8d793b-3cd0-4ae3-a3f6-caa9143315c2)
     * @param  string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  string  $ports  `Optional` for `fingerprint`. Specify the value for `ports` if the flag is `Custom`.
     * @param  string  $fonts  `Optional` for `fingerprint`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  string  $cmdParams  `Optional` for `fingerprint`. Specify command line parameters for browsers. Defaults to an empty string `""`.
     * @param  string  $isLocal  `Required` for `storage`. Defaults to `true`.
     * @param  string  $saveServiceWorker  `Optional` for `storage`. Defaults to `true`.
     * @param  string  $proxy  `Optional` for `fingerprint`. Add a proxy to your profiles.
     * @param  string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  string  $customStartUrls  `Optional` for `fingerprint`. Specify custom URLs. Max amount is 5. Defaults to `optional` unless custom is set.
     * @param  string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function profileCreate(
        ?string $name = null,
        ?string $browserType = null,
        ?string $folderId = null,
        ?string $osType = null,
        ?string $coreVersion = null,
        ?string $coreMinorVersion = null,
        ?string $autoUpdateCore = null,
        ?string $tags = null,
        ?string $times = null,
        ?string $notes = null,
        ?string $parameters = null,
        ?string $flags = null,
        ?string $webrtcMasking = null,
        ?string $audioMaskingGraphicsNoisePortsMasking = null,
        ?string $proxyMasking = null,
        ?string $geolocationPopup = null,
        ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking = null,
        ?string $geolocationMasking = null,
        ?string $quicMode = null,
        ?string $startupBehavior = null,
        ?string $canvasNoise = null,
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
        ?string $audioInputs = null,
        ?string $videoInputs = null,
        ?string $width = null,
        ?string $height = null,
        ?string $pixelRatio = null,
        ?string $accuracy = null,
        ?string $altitude = null,
        ?string $latitude = null,
        ?string $longitude = null,
        ?string $ports = null,
        ?string $fonts = null,
        ?string $cmdParams = null,
        ?string $isLocal = null,
        ?string $saveServiceWorker = null,
        ?string $proxy = null,
        ?string $saveTraffic = null,
        ?string $customStartUrls = null,
        ?string $maxTouchPoints = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileCreate($name, $browserType, $folderId, $osType, $coreVersion, $coreMinorVersion, $autoUpdateCore, $tags, $times, $notes, $parameters, $flags, $webrtcMasking, $audioMaskingGraphicsNoisePortsMasking, $proxyMasking, $geolocationPopup, $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking, $geolocationMasking, $quicMode, $startupBehavior, $canvasNoise, $fingerprint, $hardwareConcurrency, $userAgent, $platform, $osCpu, $acceptLanguages, $languages, $locale, $zone, $vendor, $renderer, $vendorId, $rendererId, $publicIp, $audioOutputs, $audioInputs, $videoInputs, $width, $height, $pixelRatio, $accuracy, $altitude, $latitude, $longitude, $ports, $fonts, $cmdParams, $isLocal, $saveServiceWorker, $proxy, $saveTraffic, $customStartUrls, $maxTouchPoints, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  string  $isRemoved  `Required`. Specify which type of profiles to search from. Defaults to `false`.
     * @param  string  $limit  `Required`. Specify the number of profiles to search. Defaults to `10`.
     * @param  string  $offset  `Required`. Specify the number of profiles to skip from the beginning of the returned data before displaying the results. 0 means starting from the beginning. Defaults to `0`.
     * @param  string  $searchText  `Required`. Search profiles by name. `maxLength`: 50 characters. An empty string searches from all the profiles.
     * @param  string  $storageType  `Required`. Specify the storage type of profiles to search.
     * @param  string  $folderId  `Optional`. Specify the folder in which searching is done
     * @param  string  $sort  `Optional`.  Specify the order order of sorting. Defaults to `asc`.
     * @param  string  $coreVersion  `Optional`. Specify the core version.
     * @param  string  $createdFrom  `Optional`. Specify the start of the date range.
     * @param  string  $createdTo  `Optional`. Specify the end of the date range.
     * @param  string  $updatedFrom  `Optional`.  Specify the start of the date range.
     * @param  string  $updatedTo  `Optional`. Specify the end of the date range.
     * @param  string  $lastLaunchedFrom  `Optional`. Specify the start of the date range.
     * @param  string  $lastLaunchedTo  `Optional`. Specify the end of the date range.
     * @param  string  $lastLaunchedBy  `Optional`. Specify the email.
     * @param  string  $lastLaunchedOn  `Optional`. Specify machine_id.
     * @param  string  $lastUpdatedBy  `Optional`. Specify the email.
     * @param  string  $inUseBy  `Optional`.  Specify the email.
     * @param  string  $createdBy  `Optional`. Specify the email.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function profileSearch(
        ?string $isRemoved = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $searchText = null,
        ?string $storageType = null,
        ?string $folderId = null,
        ?string $sort = null,
        ?string $coreVersion = null,
        ?string $createdFrom = null,
        ?string $createdTo = null,
        ?string $updatedFrom = null,
        ?string $updatedTo = null,
        ?string $lastLaunchedFrom = null,
        ?string $lastLaunchedTo = null,
        ?string $lastLaunchedBy = null,
        ?string $lastLaunchedOn = null,
        ?string $lastUpdatedBy = null,
        ?string $inUseBy = null,
        ?string $createdBy = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileSearch($isRemoved, $limit, $offset, $searchText, $storageType, $folderId, $sort, $coreVersion, $createdFrom, $createdTo, $updatedFrom, $updatedTo, $lastLaunchedFrom, $lastLaunchedTo, $lastLaunchedBy, $lastLaunchedOn, $lastUpdatedBy, $inUseBy, $createdBy, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  string  $ids  `Required`. Specify the ID of the profile to be deleted.
     * @param  string  $permanently  `Required`. Specify the value to delete profiles perminantly or not. Defaults to `false`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function profileRemove(
        ?string $ids = null,
        ?string $permanently = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileRemove($ids, $permanently, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  string  $autoUpdateCore  `Optional`. Setting to True allows passing "core_version" and "core_minor_version".
     * @param  string  $coreVersion  `Optional`. Cannot specify the version that is 6 versions older then the current latest one.
     * @param  string  $coreMinorVersion  `Optional`. Specify the minor version based on its availability.
     * @param  string  $profileId  `Required`. Specify the ID of the profile to be updated.
     * @param  string  $name  `Required`. Name your profiles.
     * @param  string  $tags  `Optional`. Specify tags. Max number is 10.
     * @param  string  $parameters  `Required`. Specify parameters for your profiles. `flags`, `fingerprint`, `storage` **are required** for **parameters**.
     * @param  string  $flags  `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
     * @param  string  $webrtcMasking  `Required` for `flags`.
     * @param  string  $audioMaskingGraphicsNoisePortsMasking  `Required` for `flags`.
     * @param  string  $proxyMasking  `Required` for `flags`.
     * @param  string  $geolocationPopup  `Required` for `flags`.
     * @param  string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking  `Required` for `flags`.
     * @param  string  $geolocationMasking  `Required` for `flags`.
     * @param  string  $autoUpdateCore  `Optional`. You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched.
     * @param  string  $quicMode  `Optional` for `flags`. `disabled` by default.
     * @param  string  $canvasNoise  `Optional` for `flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body.
     * @param  string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`.
     * @param  string  $fingerprint  `Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`.
     * @param  string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  string  $osCpu  `Optional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  string  $languages  `Required` for `localization`.
     * @param  string  $locale  `Required` for `localization`. Pass an empty string.
     * @param  string  $zone  `Required` for `timezone` Specify the value for `zone`.
     * @param  string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  string  $publicIp  `Required` for `webrtc`. Specify the value for `public_ip` if the flag is `Custom`.
     * @param  string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`.
     * @param  string  $height  `Required` for `screen`. Specify the value for `height` if the flag is `Custom`.
     * @param  string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  string  $ports  `Optional` for `fingerprint`. Specify the value for `ports` if the flag is `Custom`.
     * @param  string  $fonts  `Optional` for `fingerprint`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  string  $cmdParams  `Optional` for `fingerprint`. Specify command line parameters for browsers.
     * @param  string  $isLocal  `Required` for `storage`.
     * @param  string  $saveServiceWorker  `Optional` for `storage`.
     * @param  string  $proxy  `Optional` for `fingerprint`. Add a proxy to your profiles.
     * @param  string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  string  $customStartUrls  `Optional` for `fingerprint`. Specify custom URLs. Max amount is 5.
     * @param  string  $notes  `Optional`. Add notes to your profiles.
     * @param  string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     */
    public function profileUpdate(
        ?string $autoUpdateCore = null,
        ?string $coreVersion = null,
        ?string $coreMinorVersion = null,
        ?string $profileId = null,
        ?string $name = null,
        ?string $tags = null,
        ?string $parameters = null,
        ?string $flags = null,
        ?string $webrtcMasking = null,
        ?string $audioMaskingGraphicsNoisePortsMasking = null,
        ?string $proxyMasking = null,
        ?string $geolocationPopup = null,
        ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking = null,
        ?string $geolocationMasking = null,
        ?string $quicMode = null,
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
        ?string $audioInputs = null,
        ?string $videoInputs = null,
        ?string $width = null,
        ?string $height = null,
        ?string $pixelRatio = null,
        ?string $accuracy = null,
        ?string $altitude = null,
        ?string $latitude = null,
        ?string $longitude = null,
        ?string $ports = null,
        ?string $fonts = null,
        ?string $cmdParams = null,
        ?string $isLocal = null,
        ?string $saveServiceWorker = null,
        ?string $proxy = null,
        ?string $saveTraffic = null,
        ?string $customStartUrls = null,
        ?string $notes = null,
        ?string $maxTouchPoints = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new ProfileUpdate($autoUpdateCore, $coreVersion, $coreMinorVersion, $profileId, $name, $tags, $parameters, $flags, $webrtcMasking, $audioMaskingGraphicsNoisePortsMasking, $proxyMasking, $geolocationPopup, $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking, $geolocationMasking, $autoUpdateCore, $quicMode, $canvasNoise, $startupBehavior, $fingerprint, $hardwareConcurrency, $userAgent, $platform, $osCpu, $acceptLanguages, $languages, $locale, $zone, $vendor, $renderer, $vendorId, $rendererId, $publicIp, $audioOutputs, $audioInputs, $videoInputs, $width, $height, $pixelRatio, $accuracy, $altitude, $latitude, $longitude, $ports, $fonts, $cmdParams, $isLocal, $saveServiceWorker, $proxy, $saveTraffic, $customStartUrls, $notes, $maxTouchPoints, $contentType, $accept));
    }

    /**
     * @param  mixed  $destFolderId
     * @param  mixed  $ids
     * @param  string  $destFolderId  `Required`. Specify the folder, to which profiles will be moved.
     * @param  string  $ids  `Required`. Provide a list of profiles to be moved. Max number of IDs is 20.
     */
    public function profileMove(
        ?string $destFolderId = null,
        ?string $ids = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new ProfileMove($destFolderId, $ids, $destFolderId, $ids, $contentType, $accept));
    }

    /**
     * @param  string  $profileId  `Required`. Specify the ID of the profile to be updated.
     * @param  string  $name  `Optional`. Name your profiles.
     * @param  string  $autoUpdateCore  `Optional`.
     *                                  You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched.
     * @param  string  $coreMinorVersion  `Optional`. Specify the minor version based on its availability.
     * @param  string  $coreVersion  `Optional`. Cannot specify the version that is 6 versions older then the current latest one.
     * @param  string  $tags  `Optional`. Specify tags. Max number is 10.
     * @param  string  $proxy  `Optional` for `fingerprint`. Add a proxy to your profiles.
     * @param  string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  string  $customStartUrls  `Optional` for `fingerprint`. Specify custom URLs. Max amount is 5.
     * @param  string  $notes  `Optional`. Add notes to your profiles.
     * @param  string  $parameters  `Optional`.
     * @param  string  $flags  `Optional`.
     * @param  string  $webrtcMasking  `Optional`.
     * @param  string  $audioMaskingGraphicsNoisePortsMasking  `Optional`.
     * @param  string  $proxyMasking  `Optional`.
     * @param  string  $geolocationPopup  `Optional`.
     * @param  string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking  `Optional`.
     * @param  string  $geolocationMasking  `Optional`.
     * @param  string  $quicMode  `Optional` for `flags`. `disabled` by default.
     * @param  string  $canvasNoise  `Optional` for `flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body.
     * @param  string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`.
     * @param  string  $isLocal  `Required` for `storage`.
     * @param  string  $saveServiceWorker  `Optional` for `storage`.
     * @param  string  $fingerprint  `Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`.
     * @param  string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  string  $osCpu  `Optional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  string  $languages  `Required` for `localization`.
     * @param  string  $locale  `Required` for `localization`. Pass an empty string.
     * @param  string  $zone  `Required` for `timezone` Specify the value for `zone`.
     * @param  string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  string  $publicIp  `Required` for `webrtc`. Specify the value for `public_ip` if the flag is `Custom`.
     * @param  string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`.
     * @param  string  $height  `Required` for `screen`. Specify the value for `height` if the flag is `Custom`.
     * @param  string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  string  $ports  `Optional` for `fingerprint`. Specify the value for `ports` if the flag is `Custom`.
     * @param  string  $fonts  `Optional` for `fingerprint`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  string  $cmdParams  `Optional` for `fingerprint`. Specify command line parameters for browsers.
     * @param  string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     */
    public function profilePartialUpdate(
        ?string $profileId = null,
        ?string $name = null,
        ?string $autoUpdateCore = null,
        ?string $coreMinorVersion = null,
        ?string $coreVersion = null,
        ?string $tags = null,
        ?string $proxy = null,
        ?string $saveTraffic = null,
        ?string $customStartUrls = null,
        ?string $notes = null,
        ?string $parameters = null,
        ?string $flags = null,
        ?string $webrtcMasking = null,
        ?string $audioMaskingGraphicsNoisePortsMasking = null,
        ?string $proxyMasking = null,
        ?string $geolocationPopup = null,
        ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking = null,
        ?string $geolocationMasking = null,
        ?string $quicMode = null,
        ?string $canvasNoise = null,
        ?string $startupBehavior = null,
        ?string $isLocal = null,
        ?string $saveServiceWorker = null,
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
        ?string $audioInputs = null,
        ?string $videoInputs = null,
        ?string $width = null,
        ?string $height = null,
        ?string $pixelRatio = null,
        ?string $accuracy = null,
        ?string $altitude = null,
        ?string $latitude = null,
        ?string $longitude = null,
        ?string $ports = null,
        ?string $fonts = null,
        ?string $cmdParams = null,
        ?string $maxTouchPoints = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new ProfilePartialUpdate($profileId, $name, $autoUpdateCore, $coreMinorVersion, $coreVersion, $tags, $proxy, $saveTraffic, $customStartUrls, $notes, $parameters, $flags, $webrtcMasking, $audioMaskingGraphicsNoisePortsMasking, $proxyMasking, $geolocationPopup, $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking, $geolocationMasking, $quicMode, $canvasNoise, $startupBehavior, $isLocal, $saveServiceWorker, $fingerprint, $hardwareConcurrency, $userAgent, $platform, $osCpu, $acceptLanguages, $languages, $locale, $zone, $vendor, $renderer, $vendorId, $rendererId, $publicIp, $audioOutputs, $audioInputs, $videoInputs, $width, $height, $pixelRatio, $accuracy, $altitude, $latitude, $longitude, $ports, $fonts, $cmdParams, $maxTouchPoints, $contentType, $accept));
    }

    /**
     * @param  mixed  $ids
     * @param  string  $ids  `Required`. Specify the ID of the profile you would like to restore.
     */
    public function profileRestore(?string $ids = null, ?string $contentType = null, ?string $accept = null): Response
    {
        return $this->connector->send(new ProfileRestore($ids, $ids, $contentType, $accept));
    }

    /**
     * @param  mixed  $ids
     * @param  string  $ids  `Required`. Specify the ID of the profile, which metas you would like to fetch.
     */
    public function profileMetas(?string $ids = null, ?string $contentType = null, ?string $accept = null): Response
    {
        return $this->connector->send(new ProfileMetas($ids, $ids, $contentType, $accept));
    }

    /**
     * @param  string  $metaId  `Required`. Specify the profile id.
     */
    public function profileSummary(?string $metaId = null, ?string $contentType = null, ?string $accept = null): Response
    {
        return $this->connector->send(new ProfileSummary($metaId, $contentType, $accept));
    }

    /**
     * @param  string  $profileId  `Required`. Specify the ID of the original profile.
     * @param  string  $times  `Required`. Specify the number of profiles you would like to clone. Defaults to `1`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function profileClone(
        ?string $profileId = null,
        ?string $times = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileClone($profileId, $times, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  string  $convertToLocal  `Required`. True if you want to convert from cloud to local and false otherwise.
     * @param  string  $workspaceId  `Required`. Specify the workspace id.
     */
    public function profileConvert(
        string $profileId,
        ?string $convertToLocal = null,
        ?string $workspaceId = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new ProfileConvert($profileId, $convertToLocal, $workspaceId, $contentType, $accept));
    }

    public function screenResolution(?string $accept = null): Response
    {
        return $this->connector->send(new ScreenResolution($accept));
    }
}
