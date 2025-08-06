<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Start Quick Profile v3
 */
class StartQuickProfileV3 extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v3/profile/quick";
	}


	/**
	 * @param null|string $browserType `Required`. Choose the browser type. Note: For `android` only mimic is supported! Defaults to `mimic`,
	 * @param null|string $coreVersion `Optional`. You can skip specifying the value since your profiles will be updated to the latest core each time it is launched. Defaults to `latest`. Cannot specify the version that is 6 versions older then the current latest one.
	 * @param null|string $coreMinorVersion `Optional`. Specify the minor version based on its availability.
	 * @param null|string $osType `Required`. Specify the OS. Defaults to `windows`.
	 * @param null|string $scriptFile `Optional`
	 * @param null|string $automation `Optional`. `selenium` only for working with Script Runner. Defaults to `selenium`.
	 * @param null|string $isHeadless `Optional`. Enable headless mode. Defaults to `false`.
	 * @param null|string $proxy `Optional` for `parameters`. Add a proxy to your profiles.
	 * @param null|string $saveTraffic `Optional` for `proxy`. `false` is set by default. When set to `true`,  disables the loading of images/videos saving the proxy traffic.
	 * @param null|string $parameters `Required`. Specify parameters for your profiles. `flags`, `fingerprints`, `storage` **are required** for **parameters**.
	 * @param null|string $flags `Required`. Specify flags for your profiles. `webrtc_masking, proxy_masking, geolocation_popup, audio_masking, graphics_noise, ports_masking, navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, geolocation_masking` **are required** for **parameters**.
	 * @param null|string $webrtcMasking `Required` for `flags`. Defaults to `mask`.
	 * @param null|string $geolocationPopup `Required` for `flags`. Defaults to `prompt`.
	 * @param null|string $audioMaskingGraphicsNoise `Required` for `flags`. Defaults to `mask` for graphic_noise and to `natural` for audio masking.
	 * @param null|string $proxyMasking `Required` for `flags`. Defaults to `disabled` unsell proxy is provided, than defaults to `custom`.
	 * @param null|string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking `Required` for `flags`. Defaults to `mask` and for media_devices_masking defaults to `natural`.
	 * @param null|string $geolocationMasking `Required` for `flags`. Defaults to `mask`.
	 * @param null|string $canvasNoise `Optional` for`flags`. The value is set based on the value of `graphics_noise` by default. To set a specific value for `canvas_noise`, include `canvas_noise` in your request body. Defaults to `mask`.
	 * @param null|string $startupBehavior `Optional` for `flags`. `recover` is set by default and allows opening profiles with the tabs from the last session. `custom` opens up profiles with provided custom pages in `custom_start_urls`. Defaults to `recover`.
	 * @param null|string $fingerprint `Required` for `parameters`. Specify fingerprints of your profiles if flags are set to `Custom`. Defaults to `optional` unless custom is set.
	 * @param null|string $hardwareConcurrency `Required` for `navigator`. Specify the value for `hardware_concurrency` if the flag is `Custom`.
	 * @param null|string $userAgent `Required` for `navigator`. Specify the value for `user-agent`.
	 * @param null|string $platform `Required` for `navigator`. Specify the value for `platform` if the flag is `Custom`.
	 * @param null|string $osCpu `Oprtional` for `navigator`. Specify the value for `os_cpu`if the flag is `Custom`.
	 * @param null|string $acceptLanguages `Required` for `localization`. Specify the value for `accept_languages` if the flag is `Custom`.
	 * @param null|string $languages `Required` for `localization`. Pass an empty string.
	 * @param null|string $locale `Required` for `localization`. Pass an empty string.
	 * @param null|string $zone `Required` for `timezone`.  Specify the value for `zone`.
	 * @param null|string $vendor `Required` for `graphic`. Specify the value for `vendor` if the flag is `Custom`.
	 * @param null|string $renderer `Required` for `graphic`. Specify the value for `renderer` if the flag is `Custom`.
	 * @param null|string $vendorId `Optional` for `graphic`. Specify the value for `vendor_id` if the flag is `Custom`.
	 * @param null|string $rendererId `Optional` for `graphic`. Specify the value for `renderer_id` if the flag is `Custom`.
	 * @param null|string $publicIp `Required` for `webrtc`. Specify the value for `public_ip` if the flag is `Custom`.
	 * @param null|string $audioOutputs `Required` for `media_devices`. Specify the value for `audio_outputs` if the flag is `Custom`.
	 * @param null|string $videoInputs `Required` for `media_devices`. Specify the value for `video_inputs` if the flag is `Custom`.
	 * @param null|string $audioInputs `Required` for `media_devices`. Specify the value for `audio_inputs` if the flag is `Custom`.
	 * @param null|string $width `Required` for `screen`. Specify the value for `width` if the flag is `Custom`.
	 * @param null|string $height `Required` for `screen`.  Specify the value for `height` if the flag is `Custom`.
	 * @param null|string $pixelRatio `Required` for `screen`. Specify the value for `pixel_ratio` if the flag is `Custom`.
	 * @param null|string $ports `Optional`. Specify the value for `ports` if the flag is `Custom`.
	 * @param null|string $accuracy `Required` for `geolocation`. Specify the value for `accuracy` if the flag is `Custom`.
	 * @param null|string $altitude `Required` for `geolocation`. Specify the value for `altitude` if the flag is `Custom`.
	 * @param null|string $longitude `Required` for `geolocation`. Specify the value for `longitude` if the flag is `Custom`.
	 * @param null|string $latitude `Required` for `geolocation`. Specify the value for `latitude` if the flag is `Custom`.
	 * @param null|string $fonts `Optional` for `fingerprints`. Specify the value for `fonts` if the flag is `Custom`.
	 * @param null|string $cmdParams `Optional` for `fingerprints`. Specify command line parameters for browsers.
	 * @param null|string $customStartUrls `Optional`. Specify custom URLs. Max amount is 5. Defaults to `optional` unselss custom is set.
	 * @param null|string $maxTouchPoints `Optional` for `fingerprint` with `android` os. Default is 5.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $browserType = null,
		protected ?string $coreVersion = null,
		protected ?string $coreMinorVersion = null,
		protected ?string $osType = null,
		protected ?string $scriptFile = null,
		protected ?string $automation = null,
		protected ?string $isHeadless = null,
		protected ?string $proxy = null,
		protected ?string $saveTraffic = null,
		protected ?string $parameters = null,
		protected ?string $flags = null,
		protected ?string $webrtcMasking = null,
		protected ?string $geolocationPopup = null,
		protected ?string $audioMaskingGraphicsNoise = null,
		protected ?string $proxyMasking = null,
		protected ?string $navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking = null,
		protected ?string $geolocationMasking = null,
		protected ?string $canvasNoise = null,
		protected ?string $startupBehavior = null,
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
		protected ?string $videoInputs = null,
		protected ?string $audioInputs = null,
		protected ?string $width = null,
		protected ?string $height = null,
		protected ?string $pixelRatio = null,
		protected ?string $ports = null,
		protected ?string $accuracy = null,
		protected ?string $altitude = null,
		protected ?string $longitude = null,
		protected ?string $latitude = null,
		protected ?string $fonts = null,
		protected ?string $cmdParams = null,
		protected ?string $customStartUrls = null,
		protected ?string $maxTouchPoints = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'browser_type' => $this->browserType,
			'core_version' => $this->coreVersion,
			'core_minor_version' => $this->coreMinorVersion,
			'os_type' => $this->osType,
			'script_file' => $this->scriptFile,
			'automation' => $this->automation,
			'is_headless' => $this->isHeadless,
			'proxy' => $this->proxy,
			'save_traffic' => $this->saveTraffic,
			'parameters' => $this->parameters,
			'flags' => $this->flags,
			'webrtc_masking' => $this->webrtcMasking,
			'geolocation_popup' => $this->geolocationPopup,
			'audio_masking, graphics_noise' => $this->audioMaskingGraphicsNoise,
			'proxy_masking' => $this->proxyMasking,
			'navigator_masking, localization_masking, timezone_masking, graphics_masking, fonts_masking, media_devices_masking, screen_masking, ports_masking' => $this->navigatorMaskingLocalizationMaskingTimezoneMaskingGraphicsMaskingFontsMaskingMediaDevicesMaskingScreenMaskingPortsMasking,
			'geolocation_masking' => $this->geolocationMasking,
			'canvas_noise' => $this->canvasNoise,
			'startup_behavior' => $this->startupBehavior,
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
			'video_inputs' => $this->videoInputs,
			'audio_inputs' => $this->audioInputs,
			'width' => $this->width,
			'height' => $this->height,
			'pixel_ratio' => $this->pixelRatio,
			'ports' => $this->ports,
			'accuracy' => $this->accuracy,
			'altitude' => $this->altitude,
			'longitude' => $this->longitude,
			'latitude' => $this->latitude,
			'fonts' => $this->fonts,
			'cmd_params' => $this->cmdParams,
			'custom_start_urls' => $this->customStartUrls,
			'max_touch_points' => $this->maxTouchPoints,
		]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
