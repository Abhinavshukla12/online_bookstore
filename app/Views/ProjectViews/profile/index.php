<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
    <div class="container">
        <div class="profile-container">
            <div class="col">
                <div class="profile-header">
                    <h2>My Profile</h2>
                </div>
                <div class="profile-body">
                    <?php
                    $fields = [
                        'username' => 'Username',
                        'email' => 'Email',
                        'fullname' => 'Full Name',
                        'dob' => 'Date of Birth'
                    ];
                    foreach ($fields as $id => $label): ?>
                        <div class="profile-row">
                            <div class="profile-label">
                                <label for="<?= $id ?>"><?= $label ?>:</label>
                            </div>
                            <div class="profile-input">
                                <input type="text" id="<?= $id ?>" value="<?= esc($user[$id]) ?>" readonly>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="spacer"></div> <!-- Spacer div for gap -->
        <div class="button-container-right">
            <h3>Edit Profile</h3>
            <button class="profile-button">Button 1</button>
            <button class="profile-button">Button 2</button>
            <button class="profile-button">Button 3</button>
            <button class="profile-button">Button 4</button>
            <button class="profile-button">Button 5</button>
        </div>
    </div>    
</body>

<style>
    body{
        background-color: #7D8ABC;
    }
    .container {
        display: flex;
        align-items: flex-start;
        padding: 20px;
        background-color: #7D8ABC;
    }
    .profile-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        width: 100%;
        margin-right: 30px; /* Create a 30px gap between profile and button container */
    }
    .profile-header h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .profile-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .profile-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
    }
    .profile-label {
        flex: 1;
        font-weight: bold;
        color: #555;
    }
    .profile-input {
        flex: 2;
    }
    .profile-input input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
        color: #333;
    }
    .profile-input input[readonly] {
        background-color: #e9e9e9;
    }
    .button-container-right {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        margin-top: 25px;
        background-color: white;
        padding: 20px;
        max-width: 300px;
        width: 100%;
    }
    .profile-button {
        padding: 10px 40px;
        border: none;
        border-radius: 8px;
        background-color: red;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .profile-button:hover {
        background-color: black;
    }
    .spacer {
        width: 30px; /* Spacer width for the gap */
    }
</style>
<?= $this->endSection() ?>
