<?php
// ตัวอย่าง JWT CLASS
//https://gist.github.com/kevinyan815/d3f13ad7aec60738479b4ad2f6540a91
class Jwt
{
	/**
	 * Secret Key
	 *
	 * @var
	 */
	private $secret = '123';

	/**
	 * The header portion of jwt
	 *
	 * @var
	 */
	public $header = [
		'type' => 'jwt',
		'algo' => 'sha256'
	];

	public $signature;

	/**
	 * The payload portion of jwt
	 *
	 * @var
	 */
	public $payload = [
		'iss' => 'KevinYan',
		'sub' => '1',
		'aud' => 'KevinYan',
		'iat' => '1496814860',
		'exp' => '1496814860',
		'jti' => 'sAdgpdggt',
	];

	public function __construct(array $header = [], array $payload = [])
	{
		$this->setHeader($header)->setPayload($payload);
	}

	public function setHeader(array $header)
	{
		if($header) {
			$this->header = $header;
		}

		return $this;
	}

	public function setPayload(array $payload)
	{
		if($payload) {
			$this->payload = $payload;
		}

		return $this;
	}

	public function setSignature($signature)
	{
		$this->signature = $signature;
	}

	/***
	 * 获取Json Web Token
	 */
	public function getTokenString()
	{
		$singinInputString = $this->getSigninInputString();
		$signature = $this->sign($this->header['algo'], $singinInputString, $this->secret);

		return sprintf("%s.%s", $singinInputString, base64_encode($signature));
	}

	/**
	 * 获取要签名的内容
	 */
	public function getSigninInputString()
	{
		$encodedHeader = base64_encode(json_encode($this->header));
		$encodedPayload = base64_encode(json_encode($this->payload));

		return sprintf("%s.%s", $encodedHeader, $encodedPayload);
	}

	/**
	 * 用指定的密钥和哈希算法对内容进行签名
	 */
	public function sign($algo, $input, $secret)
	{
		return hash_hmac($algo, $input, $secret);
	}

    /**
     * 解码Web Token
     */
	protected function decode($token)
	{
		$jwt = explode('.', $token);
		if(count($jwt) < 3) {
			return false;
		}
		$header = json_decode(base64_decode($jwt[0]), true);
		$payload = json_decode(base64_decode($jwt[1]), true);
		$signature = base64_decode($jwt[2]);

		$this->setHeader($header)->setPayload($payload)->setSignature($signature);

		return true;
	}

    /**
     * 验证Token
     */
	public function verify($token)
	{
		if(!$this->decode($token)) {
			return false;
		}

		$signature = hash_hmac($this->header['algo'], $this->getSigninInputString(), $this->secret);

		return hash_equals($signature, $this->signature);
	}

}


// $jwt = new Jwt();
// $token = $jwt->getTokenString();
// echo '----------token value: ' . $token . chr(10);
// if($jwt->verify($token)) {
// 	echo 'Success' . chr(10);
// } else {
// 	echo 'Failed' . chr(10);
// }