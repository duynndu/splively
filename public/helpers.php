<?php
function splitArray5_13_5(array $array): array {
    $part1Size = 5;
    $part2Size = 13;
    $part3Size = 5;

    $part1 = array_slice($array, 0, $part1Size);
    $part2 = array_slice($array, $part1Size, $part2Size);
    $part3 = array_slice($array, $part1Size + $part2Size, $part3Size);

    return [$part1, $part2, $part3];
}

function convertDateRange($dateRange): array
{
    // Tách chuỗi thành 2 phần tử bằng từ khóa "to"
    $dates = explode(' to ', $dateRange);

    // Chuyển đổi ngày thành định dạng YYYY-mm-dd
    $startDate = date('Y-m-d', strtotime($dates[0]));
    $endDate = date('Y-m-d', strtotime($dates[1]));

    // Trả về mảng chứa 2 phần tử
    return [$startDate, $endDate];
}
