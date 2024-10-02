<?php
// Image modul 

function image_modal($dir, $nested = false, $modul_popup = true) {
    $array = create_sorted_array($dir);

    $description_array = [];

    if ($nested) {
        $nested_array = [];
        $new_array = [];
        
        foreach ($array as $index => $folder ) {
            if ($handle = opendir($dir . '/' . $folder)) {
                $counter = 0;
                while(($file = readdir($handle)) !== FALSE) {
                    if ($file != "." && $file != "..") {
                        // Check if the file is a PHP file (that contains project description)
                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                        
                        if ($file_extension === 'php') {
                            $description_array[$index] = $dir . $folder . '/' . $file;
                            continue;
                        }

                        if ($counter == 0) {
                            // Only add one image for every folder  
                            $new_array[] = $folder . '/' . $file;
                            $counter++;
                        }
                        // Add all images in nested array
                        $nested_array[$index][] = $folder . '/' . $file;
                    }
                }
            }
        }

        sort($nested_array);

        if ($modul_popup) {
            foreach ($nested_array as $i => $folder) { 
                $folder_name = dirname($folder[$i]);
                ?>
                <div id="<?= $folder_name; ?>-modal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="<?= $folder_name; ?>-modal modal-content">
                        <?php
                        foreach ($folder as $index => $file) {
                            $array_length = count($folder);
    
                            $class_name = dirname($file);
                            ?>
                            
                                <div class="<?= $class_name; ?>">
                                    <div class="numbertext"><?= ($index + 1) . ' / ' . ($array_length);?></div>
                                    <img src="<?= $dir . $file; ?>">
                                </div>
                            
                        <?php } ?>
                        <!-- Next/previous controls -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a> 
                    </div>
                </div>
            <?php }
        }
        
        $array = $new_array;
    } else {
        $arrayLength = count($array);

        if ($modul_popup) {
            foreach($array as $index => $image ) { 

            // Check if the file is a PHP file (that contains project description)
            $file_extension = pathinfo($image, PATHINFO_EXTENSION);
                        
            if ($file_extension === 'php') {
                $description_array[$index] = $dir . '/' . $image;
                continue;
            }
            // Remove the number and dash at the start (used to sort imgs)
            $remove_sort_number = preg_replace('/^\d+-/', '', $image);
        
            // Remove extension from filename
            $image_name = preg_replace('/\.\w+$/', '', $remove_sort_number);
            ?>
            <div id="<?= $image_name; ?>-modal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="<?= $image_name; ?>-modal modal-content">
                    <div class="<?= $image_name; ?>">
                        <div class="numbertext">1 / 1</div>
                        <img src="<?= $dir . $image; ?>">
                    </div>
                </div>
            </div>
        <?php }
        }
    }

    foreach($array as $index => $image ) {
        if ($nested) {
            $image_name = dirname($image);
        } else {
            // Remove the number and dash at the start (used to sort imgs)
            $remove_sort_number = preg_replace('/^\d+-/', '', $image);
                
            // Remove extension from filename
            $image_name = preg_replace('/\.\w+$/', '', $remove_sort_number);
        }

        
    
        // Add new row if it's the first image in rows of 3
        if ($index % 3 == 0) {
            echo('<div class="row">');
        } ?>
        
        <div class="column <?php echo $modul_popup ? '' : 'no_popup'; ?>">
            <img src="<?= $dir . $image; ?>" id="<?= $image_name; ?>" alt="<?= $image_name; ?>" class="hover-shadow">
            <?php
            if (array_key_exists($index, $description_array)) {
                include($description_array[$index]);
            }
            ?>
        </div>
        
        <?php
        // Close row if it's the third image in the row or if it's the last image
        if ($index % 3 == 2 || $index == $arrayLength -1) {
            echo('</div>');
        } 
    }
}

function create_sorted_array($dir) {
    $images = [];

    if (is_dir($dir)) {
        if ($handle = opendir($dir)) {
            while(($file = readdir($handle)) !== FALSE) {
                if ($file != "." && $file != "..") {
                    $file_path = $dir . '/' . $file;
                    // if folder then add to array directories
                    if (is_dir($file_path)) {
                        $directories[] = $file;
                    } else {    
                        $images[] = $file; 
                    }
                }
            }
            closedir($handle);
        }
    }

    // If folder return array of folders
    if (!empty($directories)) {
        sort($directories);
        return $directories;
    }

    // If no folders exist return the image files array
    sort($images);
    return $images;
}
