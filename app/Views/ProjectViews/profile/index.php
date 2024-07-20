<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
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
        <div class="button-container">
            <button class="profile-button">Button 1</button>
            <button class="profile-button">Button 2</button>
            <button class="profile-button">Button 3</button>
            <button class="profile-button">Button 4</button>
            <button class="profile-button">Button 5</button>
            <button class="profile-button">Button 6</button>
        </div>
    </div>
</div>
<style>
    .profile-container {
        display: flex;
        justify-content: flex-start; /* Align to the left */
        align-items: flex-start; /* Align to the top */
        padding: 20px;
        background-color: #f9f9f9;
        margin-left: 20px; /* Add margin to the left */
    }
    .col {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        width: 100%;
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
    .button-container {
        margin-top: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    .profile-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .profile-button:hover {
        background-color: #0056b3;
    }
</style>
<?= $this->endSection() ?>
