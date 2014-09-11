<?php
require '../lib/FtpClient/FtpClient.php';
require '../lib/FtpClient/FtpException.php';
require '../lib/FtpClient/TransportException.php';
require '../lib/FtpClient/ErrorHandler.php';
require '../lib/FtpClient/FtpResponse.php';
require '../lib/FtpClient/TransportInterface.php';
require '../lib/FtpClient/TransportSocket.php';
require '../lib/FtpClient/TransportStream.php';



use ngyuki\FtpClient\FtpClient;
use ngyuki\FtpClient\FtpException;
use ngyuki\FtpClient\TransportException;

$ftp = new FtpClient();

try
{
		// 接続
    $ftp->connect("192.168.1.35", 21, 10);
		// ログイン
    $ftp->login("admin", "Khrzt6LQvV");

		// カレントディレクトリ
		$current_directory = '/usr/home/test/kenji2/';

    echo "nlist...\n";
    echo implode("\n", $ftp->nlist($current_directory));
    echo "\n\n";

    echo "put...\n";
    $ftp->put($current_directory."test.txt", "testing");

    $ftp->quit();

    echo "done.\n";
}
catch (FtpException $ex)
{
    echo "FtpException: {$ex->getResponse()->getResponseLine()}\n";
}
catch (TransportException $ex)
{
    echo "TransportException: {$ex->getMessage()}\n";
}
