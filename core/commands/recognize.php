<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

class ACRCloud
{
    private $access_key;
    private $access_secret;
    private $base_url = 'eu-west-1.api.acrcloud.com';
    private $api_version = '/v1';
    private $ffmpeg_path = 'ffmpeg';

    public function __construct($access_key, $access_secret, $base_url = null, $ffmpeg_path = null)
    {
        $this->access_key = $access_key;
        $this->access_secret = $access_secret;
        if (null !== $base_url) {
            $this->base_url = $base_url;
        }
        if (null !== $ffmpeg_path) {
            $this->ffmpeg_path = $ffmpeg_path;
        }
    }

    public function identify($file_path, $start = 5, $duration = 20)
    {
        $wav_data = $this->getWavData($file_path, intval($start), intval($duration));
        $data = $this->apiPost($wav_data);
        $data = json_decode($data, true);
        return $data;
    }

    protected function getWavData($file_path, $start, $duration)
    {
        $command = escapeshellarg($this->ffmpeg_path).' -i '.escapeshellarg($file_path).' -ac 1 -ar 8000 -f wav -ss '.$start.' -t '.$duration.' - 2>/dev/null';
        $wav = '';
        $phandle = popen($command, 'r');
        while (!feof($phandle)) {
            $wav .= fread($phandle, 1024);
        }
        pclose($phandle);
        return($wav);
    }

    protected function apiPost($data)
    {
        $uri = $this->api_version.'/identify';
        $url = $this->base_url.$uri;
        $data_type = 'audio';
        $signature_version = '1';
        $timestamp = time();
        $string_to_sign = 'POST'."\n"
            .$uri."\n"
            .$this->access_key."\n"
            .$data_type."\n"
            .$signature_version."\n"
            .$timestamp;
        $signature = hash_hmac('sha1', $string_to_sign, $this->access_secret, true);
        $signature = base64_encode($signature);
        $filesize = mb_strlen($data);
        $postfields = [
            'access_key' => $this->access_key,
            'data_type' => $data_type,
            'sample_bytes' => $filesize,
            'sample' => $data,
            'signature_version' => $signature_version,
            'signature' => $signature,
            'timestamp' => $timestamp,
        ];
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request);
        curl_close($request);
        return($response);
    }
}
