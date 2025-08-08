<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class ProfileFingerprint extends Data
{
    public function __construct(
        public NavigatorData $navigator,
        public LocalizationData $localization,
        public TimezoneData $timezone,
        public GraphicData $graphic,
        public WebRTCData $webrtc,
        #[MapName('media_devices')]
        public MediaDevicesData $mediaDevices,
        public ScreenData $screen,
        public GeolocationData $geolocation,
        /** @var int[] */
        public array $ports = [],
        /** @var string[] */
        public array $fonts = [],
        #[MapName('cmd_params')]
        public ?CmdParamsData $cmdParams = null,
    ) {}
}

class NavigatorData extends Data
{
    public function __construct(
        #[MapName('hardware_concurrency')]
        public int $hardwareConcurrency,
        public string $platform,
        #[MapName('user_agent')]
        public string $userAgent,
        #[MapName('os_cpu')]
        public ?string $osCpu = null,
    ) {}
}

class LocalizationData extends Data
{
    public function __construct(
        public string $languages,
        public string $locale,
        #[MapName('accept_languages')]
        public string $acceptLanguages,
    ) {}
}

class TimezoneData extends Data
{
    public function __construct(
        public string $zone,
    ) {}
}

class GraphicData extends Data
{
    public function __construct(
        public string $renderer,
        public string $vendor,
    ) {}
}

class WebRTCData extends Data
{
    public function __construct(
        #[MapName('public_ip')]
        public string $publicIp,
    ) {}
}

class MediaDevicesData extends Data
{
    public function __construct(
        #[MapName('audio_inputs')]
        public int $audioInputs,
        #[MapName('audio_outputs')]
        public int $audioOutputs,
        #[MapName('video_inputs')]
        public int $videoInputs,
    ) {}
}

class ScreenData extends Data
{
    public function __construct(
        public int $height,
        #[MapName('pixel_ratio')]
        public float $pixelRatio,
        public int $width,
    ) {}
}

class GeolocationData extends Data
{
    public function __construct(
        public float $accuracy,
        public float $altitude,
        public float $latitude,
        public float $longitude,
    ) {}
}

class CmdParamsData extends Data
{
    public function __construct(
        /** @var CmdParamData[] */
        public array $params = [],
    ) {}
}

class CmdParamData extends Data
{
    public function __construct(
        public string $flag,
        public bool $value,
    ) {}
}