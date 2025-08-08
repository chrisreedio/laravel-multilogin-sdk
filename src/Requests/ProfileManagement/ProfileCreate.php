<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Create
 */
class ProfileCreate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/create';
    }

    /**
     * @param  null|string  $name  `Required`. Name your profiles.
     * @param  null|string  $browserType  `Required`. Choose the browser type. Note: For `android` only mimic is supported! Defaults to `mimic`.
     * @param  null|string  $folderId  `Required`.
     *                                 Specify the folder in which profiles will be created. The ID can be retrived with `GET /workspace/folders.`
     * @param  null|string  $osType  `Required`. Specify the OS. Defaults to `windows`.
     * @param  null|string  $coreVersion  `Optional`.
     *                                    You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched. Cannot specify the version that is 6 versions older then the current latest one.
     * @param  null|string  $coreMinorVersion  `Optional`. Specify the minor version based on its availability.
     * @param  null|string  $autoUpdateCore  `Optional`
     *                                       You can skip specifying the value since your profiles will be updated to the latest core by default each time it is launched. Defaults to `true`.
     * @param  null|string  $tags  `Optional`. Specify tags. Max number is 10.
     * @param  null|string  $times  `Optional`.
     *                              Specify a number of profiles to create. Defaults to `1`.
     * @param  null|string  $notes  `Optional`. Add notes to your profiles. Defaults to an empty string`""`
     * @param  null|string  $parameters  `Required`. Specify parameters for your profiles. `flags`, `fingerprint`, `storage` **are required** for **parameters**.
     * @param  null|string  $flags  `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
     * @param  null|string  $webrtcMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  null|string  $audioMaskingGraphicsNoisePortsMasking  `Required` for `flags`. Defaults to `natural` for audio_masking and `mask` for rest.
     * @param  null|string  $proxyMasking  `Required` for `flags`. Defaults to `disabled` unless proxy is configured, than defaults to `custom`.
     * @param  null|string  $geolocationPopup  `Required` for `flags`. Defaults to `prompt`.
     * @param  null|string  $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking  `Required` for `flags`. Defaults to `mask` and for media_devices_masking defaults to `natural`.
     * @param  null|string  $geolocationMasking  `Required` for `flags`. Defaults to `mask`.
     * @param  null|string  $quicMode  `Optional` for `flags`. `disabled` by default.
     * @param  null|string  $startupBehavior  `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`. Defaults to `recover`.
     * @param  null|string  $canvasNoise  `Optional` for `flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body.
     * @param  null|string  $fingerprint  In Strict mode is`Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`. Defaults to `optional` unless custom is set.
     * @param  null|string  $hardwareConcurrency  `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
     * @param  null|string  $userAgent  `Required` for `navigator`. Specify the value for `user-agent`.
     * @param  null|string  $platform  `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
     * @param  null|string  $osCpu  `Optional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
     * @param  null|string  $acceptLanguages  `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
     * @param  null|string  $languages  `Required` for `localization`.
     * @param  null|string  $locale  `Required` for `localization`.
     * @param  null|string  $zone  `Required` for `timezone` Specify the value for `zone`.
     * @param  null|string  $vendor  `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
     * @param  null|string  $renderer  `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  null|string  $vendorId  `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
     * @param  null|string  $rendererId  `Optional` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
     * @param  null|string  $publicIp  `Required` for `webrtc`. Specify the value for `renderer_id` if the flag is `Custom`.
     * @param  null|string  $audioOutputs  `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
     * @param  null|string  $audioInputs  `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
     * @param  null|string  $videoInputs  `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
     * @param  null|string  $width  `Required` for `screen`. Specify the value for `width` if the flag is `Custom`. The Screen Resolution endpoint is found under Profile Management->[Screen Resolution](https://documenter.getpostman.com/view/28533318/2s946h9Cv9#5a8d793b-3cd0-4ae3-a3f6-caa9143315c2)
     * @param  null|string  $height  `Required` for `screen`. Specify the value for `height` if the flag is `Custom`. The Screen Resolution endpoint is found under Profile Management->[Screen Resolution](https://documenter.getpostman.com/view/28533318/2s946h9Cv9#5a8d793b-3cd0-4ae3-a3f6-caa9143315c2)
     * @param  null|string  $pixelRatio  `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
     * @param  null|string  $accuracy  `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
     * @param  null|string  $altitude  `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
     * @param  null|string  $latitude  `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
     * @param  null|string  $longitude  `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
     * @param  null|string  $ports  `Optional` for `fingerprint`. Specify the value for `ports` if the flag is `Custom`.
     * @param  null|string  $fonts  `Optional` for `fingerprint`. Specify the value for `fonts` if the flag is `Custom`.
     * @param  null|string  $cmdParams  `Optional` for `fingerprint`. Specify command line parameters for browsers. Defaults to an empty string `""`.
     * @param  null|string  $isLocal  `Required` for `storage`. Defaults to `true`.
     * @param  null|string  $saveServiceWorker  `Optional` for `storage`. Defaults to `true`.
     * @param  null|string  $proxy  `Optional` for `fingerprint`. Add a proxy to your profiles.
     * @param  null|string  $saveTraffic  `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
     * @param  null|string  $customStartUrls  `Optional` for `fingerprint`. Specify custom URLs. Max amount is 5. Defaults to `optional` unless custom is set.
     * @param  null|string  $maxTouchPoints  `Optional` for `fingerprint` with `android` os. Default is 5.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $browserType = null,
        protected ?string $folderId = null,
        protected ?string $osType = null,
        protected ?string $coreVersion = null,
        protected ?string $coreMinorVersion = null,
        protected ?string $autoUpdateCore = null,
        protected ?string $tags = null,
        protected ?string $times = null,
        protected ?string $notes = null,
        protected ?string $parameters = null,
        protected ?string $flags = null,
        protected ?string $webrtcMasking = null,
        protected ?string $audioMaskingGraphicsNoisePortsMasking = null,
        protected ?string $proxyMasking = null,
        protected ?string $geolocationPopup = null,
        protected ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking = null,
        protected ?string $geolocationMasking = null,
        protected ?string $quicMode = null,
        protected ?string $startupBehavior = null,
        protected ?string $canvasNoise = null,
        protected ?string $fingerprint = null,
        protected ?string $hardwareConcurrency = null,
        protected ?string $userAgent = null,
        protected ?string $platform = null,
        protected ?string $osCpu = null,
        protected ?string $acceptLanguages = null,
        protected ?string $languages = null,
        protected ?string $locale = null,
        protected ?string $zone = null,
        protected ?string $vendor = null,
        protected ?string $renderer = null,
        protected ?string $vendorId = null,
        protected ?string $rendererId = null,
        protected ?string $publicIp = null,
        protected ?string $audioOutputs = null,
        protected ?string $audioInputs = null,
        protected ?string $videoInputs = null,
        protected ?string $width = null,
        protected ?string $height = null,
        protected ?string $pixelRatio = null,
        protected ?string $accuracy = null,
        protected ?string $altitude = null,
        protected ?string $latitude = null,
        protected ?string $longitude = null,
        protected ?string $ports = null,
        protected ?string $fonts = null,
        protected ?string $cmdParams = null,
        protected ?string $isLocal = null,
        protected ?string $saveServiceWorker = null,
        protected ?string $proxy = null,
        protected ?string $saveTraffic = null,
        protected ?string $customStartUrls = null,
        protected ?string $maxTouchPoints = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'browser_type' => $this->browserType,
            'folder_id' => $this->folderId,
            'os_type' => $this->osType,
            'core_version' => $this->coreVersion,
            'core_minor_version' => $this->coreMinorVersion,
            'auto_update_core' => $this->autoUpdateCore,
            'tags' => $this->tags,
            'times' => $this->times,
            'notes' => $this->notes,
            'parameters' => $this->parameters,
            'flags' => $this->flags,
            'webrtc_masking' => $this->webrtcMasking,
            'audio_masking, graphics_noise, ports_masking' => $this->audioMaskingGraphicsNoisePortsMasking,
            'proxy_masking' => $this->proxyMasking,
            'geolocation_popup' => $this->geolocationPopup,
            'navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking' => $this->navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMasking,
            'geolocation_masking' => $this->geolocationMasking,
            'quic_mode' => $this->quicMode,
            'startup_behavior' => $this->startupBehavior,
            'canvas_noise' => $this->canvasNoise,
            'fingerprint' => $this->fingerprint,
            'hardware_concurrency' => $this->hardwareConcurrency,
            'user_agent' => $this->userAgent,
            'platform' => $this->platform,
            'os_cpu' => $this->osCpu,
            'accept_languages' => $this->acceptLanguages,
            'languages' => $this->languages,
            'locale' => $this->locale,
            'zone' => $this->zone,
            'vendor' => $this->vendor,
            'renderer' => $this->renderer,
            'vendor_id' => $this->vendorId,
            'renderer_id' => $this->rendererId,
            'public_ip' => $this->publicIp,
            'audio_outputs' => $this->audioOutputs,
            'audio_inputs' => $this->audioInputs,
            'video_inputs' => $this->videoInputs,
            'width' => $this->width,
            'height' => $this->height,
            'pixel_ratio' => $this->pixelRatio,
            'accuracy' => $this->accuracy,
            'altitude' => $this->altitude,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'ports' => $this->ports,
            'fonts' => $this->fonts,
            'cmd_params' => $this->cmdParams,
            'is_local' => $this->isLocal,
            'save_service_worker' => $this->saveServiceWorker,
            'proxy' => $this->proxy,
            'save_traffic' => $this->saveTraffic,
            'custom_start_urls' => $this->customStartUrls,
            'max_touch_points' => $this->maxTouchPoints,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
