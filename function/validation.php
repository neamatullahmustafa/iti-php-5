<?php

declare(strict_types=1); // strict requirement
function validateInputName(string $a ,string $b): string
{
  if (isset($_POST[$b]) && isset($_POST[$a])) {
    if (!empty($_POST[$a])) {
      return "$_POST[$a]";
    }
     return "";
  }
  return "";
}
function validateInputError(string $a ,string $b): string
{
  if (isset($_POST[$b])) {
    if (isset($_POST[$a])) {
      if (empty($_POST[$a])) {
        return "Your $a is required";
      }
      return "";
    }
    return "";
  }
  return "";
}
function validateInputGender(string $a ,string $b) : string {
  if (isset($_POST['submit']) && isset($_POST[$b])) {
  if ($_POST[$b]==$a) 
  return "checked";
  else return"";
  }
  return"";
}
function validateGenderError(string $a ) : string {
  if (isset($_POST['submit'])) {
    if (!isset($_POST[$a])) {
        return "Your $a is required";
      
      return "";
    }
    return "";
  }
  return "";
}
?>

