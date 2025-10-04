let fullName = prompt("Please enter your full name:");

// 2. Check if the user entered something.
// If the user clicks "Cancel", prompt() returns null.
// If the user clicks "OK" without entering anything, it returns an empty string "".
if (fullName) {
  // 3. Remove any leading/trailing whitespace from the input.
  let trimmedName = fullName.trim();

  // 4. Calculate the length of the trimmed full name.
  let nameLength = trimmedName.length;

  // 5. Generate the username by concatenating the parts.
  // Format: @ + fullName + length
  let username = "@" + trimmedName + nameLength;

  // 6. Display the generated username in the console.
  console.log("Your generated username is:", username);
} else {
  // Handle the case where the user did not provide a name.
  console.log("No name was entered. Cannot generate a username.");
}

/*
Example Walkthrough:
1. User is prompted and enters "Tony Stark".
2. The code checks that the input is not null.
3. `trim()` ensures there are no extra spaces.
4. `nameLength` becomes 10 (since "Tony Stark" has 10 characters).
5. The username is constructed: "@" + "Tony Stark" + "10".
6. The final output to the console is: "@Tony Stark10"
*/
