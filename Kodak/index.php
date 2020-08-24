<?php
error_reporting(E_ALL);
$images_dir    = './images';
$images = array_diff(scandir($images_dir), array('.', '..'));

$html = '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">';
$html .= '<title>My Image Processor</title>';
$html .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
$html .= '<style>body{margin:0;padding:0;background-color:#ccccee;}.app{width:100%;padding-top:2.4rem;padding-bottom: 2.4rem;</style>';
$html .= '</head><body>';
$html .= '<div class="app"><div class="container"><div class="row justify-content-center">';
echo $html;

$filter_arr = array(IMG_FILTER_NEGATE, IMG_FILTER_GRAYSCALE, IMG_FILTER_EDGEDETECT, IMG_FILTER_EMBOSS, IMG_FILTER_GAUSSIAN_BLUR, IMG_FILTER_SELECTIVE_BLUR, IMG_FILTER_MEAN_REMOVAL);
foreach($images as $image)
{
	$img_file = 'images/' . $image;
	else if(exif_imagetype($img_file) == IMAGETYPE_JPEG)
	{
		echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="' . $img_file . '" title="' . $image . '"></div>';

		foreach($filter_arr as $filter)
		{
			$im = imagecreatefromjpeg($img_file);
			if($im && imagefilter($im, $filter))
			{
				ob_start();
				imagepng($im);
				$imagedata = ob_get_clean();
				echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
			}
			imagedestroy($im);
		}

		// IMG_FILTER_BRIGHTNESS
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, random_int(-100, 100)))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);

		// IMG_FILTER_COLORIZE
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_COLORIZE, random_int(0, 255), random_int(0, 255), random_int(0, 255), random_int(0, 127)))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);

		// IMG_FILTER_PIXELATE
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_PIXELATE, random_int(0, 10), true))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);

		// IMG_FILTER_SMOOTH
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_SMOOTH, random_int(0, 100)))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);

		// IMG_FILTER_CONTRAST
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_CONTRAST, random_int(-100, 100)))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);

		// IMG_FILTER_BRIGHTNESS
		$im = imagecreatefromjpeg($img_file);
		if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, random_int(-255, 255)))
		{
			ob_start();
			imagepng($im);
			$imagedata = ob_get_clean();
			echo '<div class="col-2"><img class="img-thumbnail w-100 my-2" src="data:image/png;base64,' . base64_encode($imagedata) . '" title="' . $image . '"></div>';
		}
		imagedestroy($im);
	}
}

function is_jpeg(&$pict)
{
	return (bin2hex($pict[0]) == 'ff' && bin2hex($pict[1]) == 'd8');
}

function is_png(&$pict)
{
	return (bin2hex($pict[0]) == '89' && $pict[1] == 'P' && $pict[2] == 'N' && $pict[3] == 'G');
}
  
$html = '</div></div></div>';
$html .= '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
$html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
$html .= '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
$html .= '</body></html>';
echo $html;
