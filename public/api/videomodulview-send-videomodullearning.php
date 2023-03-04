package com.android.chat_apps;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class LoginActivity extends AppCompatActivity {

    private Button buttonButton;
    private Button buttonTwoButton;
    private EditText etEmail;
    private EditText etPassword;
    private TextView tvDonHaveAccount;

    private TextView tvUser, tvEmail;

    private Global globalVar = new Global();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        init();
    }

    private void init() {
        buttonTwoButton = this.findViewById(R.id.button_two_button);
        buttonTwoButton.setOnClickListener((view) -> {
            this.onButtonPressed();
        });

        etEmail = this.findViewById(R.id.et_email);
        etPassword = this.findViewById(R.id.et_password);
        tvDonHaveAccount = this.findViewById(R.id.don_thave_an_accoun_button);
        tvUser = this.findViewById(R.id.text_nama);
        tvEmail = this.findViewById(R.id.text_email);


        tvDonHaveAccount.setOnTouchListener(new View.OnTouchListener() {
            @SuppressLint("ClickableViewAccessibility")
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                // TODO Auto-generated method stub
                if (event.getAction() == MotionEvent.ACTION_DOWN) {
                    startActivity(new Intent(LoginActivity.this, RegisterActivity.class));
                }
                return false;
            }
        });
    }

    public void onButtonPressed() {
        System.out.println("Login Pressed" + globalVar.getAPI_URL() );
        this.postData();
    }

    public void postData() {
        JSONObject object = new JSONObject();
        try {
            //input your API parameters
            object.put("email", etEmail.getText());
            object.put("password",etPassword.getText());
        } catch (JSONException e) {
            e.printStackTrace();
        }
        // Enter the correct url for your api service site
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.POST, globalVar.API_URL + "api/login", object,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            if(!response.getBoolean("login")){
                                Toast.makeText(getApplicationContext(), response.getString("msg"),
                                        Toast.LENGTH_LONG).show();
                            }
                            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                            intent.putExtra("USER_ID", response.getString("user_id"));
                            System.out.println("user_id : " + response.getString("user_id"));
//                            intent.putExtra("EMAIL", response.getString("email"));
//                            intent.putExtra("PASSWORD", response.getString("password"));
                            startActivity(intent);
                            finish();

//                            Intent intent = new Intent(LoginActivity.this, Room.class);
//                            intent.putExtra("USER_ID", response.getString("user_id"));
//                            System.out.println("user_id : " + response.getString("user_id"));
//                            startActivity(intent);
//                            finish();

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.d("Error", "Error: " + error.getMessage());
                Toast.makeText(LoginActivity.this, "" + error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        requestQueue.add(jsonObjectRequest);
    }
}