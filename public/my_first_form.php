
	<?php var_dump($_GET); ?>
	<?php var_dump($_POST); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FORMS PRACTICE</title>
	</head>
	<body>
		<h2>Login Page</h2>
		<form method="POST" action="/my_first_form.php">
			<p>
				<input id="username" name="username" type="text" placeholder="Username">
			</p>
			<p>
				<input id="password" name="password" type="password" placeholder="Password">
			</p>
			<p>
				<button type="submit" name="submit_button">Login</button>
			</p>
		</form>
		<h2>Compose Email</h2>
		<form>
			<p>
				<input type="email" name="to" placeholder="To:">
			</p>
			<p>
				<input type="email" name="from" placeholder="From:">
			</p>
			<p>
				<input type="text" name="subject" placeholder="Subject">
			</p>
			<p>
				<textarea  id="email_body" name="email_body" rows="5" cols="20" placeholder= "Email Content Goes Here"></textarea>
			</p>
			<p>
				<label for="save_to_sent_folder">Save to sent folder?</label>	
				<input type="checkbox" id="save_to_sent_folder" name="save_to_sent_folder" value="yes" checked>
			</p>

			<button type="submit">Submit</button>
		</form>
		<form>
			<h2>Multiple Choice Test</h2>
			<p> Whats the first decimal point in pie?</p>
			<label>
				<input type="radio" name="q1" value="4">
				4
			</label>
			<label>
				<input type="radio" name="q1" value="1">
				1
			</label>
			<label>
				<input type="radio" name="q1" value="3">
				3
			</label>
			<p> What is the first whole number in pie?</p>
				<label>
					<input type="radio" name="q2" value="4">
					4
				</label>
				<label>
					<input type="radio" name="q2" value="3">
					3
				</label>
				<label>
					<input type="radio" name="q2" value="1">
					1	
				</label>
				<p>
					<button type="submit">Submit</button>
				</p>
		</form>
		<h2>Pick Your Poison</h2>
		<form>
			<p>What game console do you play?</p>
			<label><input type="checkbox" id="console1" name="console[]" value="Nintendo"> Nintendo</label>
			<label><input type="checkbox" id="console2" name="console[]" value="Sega"> Sega</label>
			<label><input type="checkbox" id="console3" name="console[]" value="Sony"> Sony</label>
			<label><input type="checkbox" id="console4" name="console[]" value="Microsoft"> Microsoft</label>
			<p>
                <button type="submit">Submit</button>
			</p>
            <label for="consoles">What consoles do you own?</label>
            <select id="consoles" name="consoles[]" multiple>
                <option value="Nintendo">Nintendo</option>
                <option value="Sega">Sega</option>
                <option value="Sony">Sony</option>
                <option value="Microsoft">Microsoft</option>
            </select>
            <button type="Submit">Submit</button>
		</form>
        <form>
            <h2>Do you smash?</h2>
            <label for="smash">Select the genre you play most: </label>
            <select id="smash" name="smash">
                <option value="1">Yes</option>
                <option value="0"selected>No</option>
            </select>
            <button type="Submit">Submit</button>
        </form>
	</body>
</html>