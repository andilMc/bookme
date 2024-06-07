<?php

namespace core\file;

class File
{
    public static function upload(array $file, string $target_dir, array $ext = ["jpeg", "jpg", "pdf", "png","pdf"], int $maxSize = 10048576)
    {
        if (!empty($file)) {
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
                File::upload($file, $target_dir, $ext, $maxSize);
            }
            $target_file = $target_dir . basename($file["name"]);
            $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (array_search($FileType, $ext) >= 0) {
                if ($file["size"] > $maxSize) {
                    return -1;
                } else {
                    move_uploaded_file($file["tmp_name"], $target_file);
                    return $target_file;
                }
            } else {
                return -2;
            }
        } else {
            return false;
        }
    }

    public static function delete($path) {
        if (file_exists($path)) {
            if (unlink($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

}
