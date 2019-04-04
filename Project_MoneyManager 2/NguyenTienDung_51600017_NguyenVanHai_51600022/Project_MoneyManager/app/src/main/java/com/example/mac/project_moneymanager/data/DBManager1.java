package com.example.mac.project_moneymanager.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.Toast;

import com.example.mac.project_moneymanager.model.Infomation;

import java.util.ArrayList;
import java.util.List;

public class DBManager1 extends SQLiteOpenHelper {
    private static final String DATABASE_NAME="infocustomer ";
    private static final String ID="id";
    private static final String TABLE_NAME1="infomationcus";
    private static final String NUMBERCOST ="numbercost";
    private static final String GROUP="groups";
    private static final String NOTE="note";
    private static final String DATE="date";
    private static final String MONEY="money";
    private static final String WHO="who";

    private static int VERSION = 1;
    private Context context;

    private String SQLQuery1 = "CREATE TABLE " + TABLE_NAME1 + "(" +
            ID + " integer primary key, " +
            NUMBERCOST + " integer, " +
            GROUP + " TEXT, "+
            NOTE + " TEXT, "+
            DATE + " TEXT, "+
            MONEY + " TEXT, "+
            WHO + " TEXT )";
    public DBManager1(Context context) {
        super(context, DATABASE_NAME, null, VERSION);
        Log.d("DBManager", "DBManager: ");
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        sqLiteDatabase.execSQL(SQLQuery1);
        Log.d("DBManager", "creat: ");
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        Log.d("DBManager", "update: ");
    }
    public void addInfomationr(Infomation infomation){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values1 = new ContentValues();
        values1.put(NUMBERCOST,infomation.getNumbercost());
        values1.put(GROUP,infomation.getGroups());
        values1.put(NOTE,infomation.getNote());
        values1.put(DATE,infomation.getDate());
        values1.put(MONEY,infomation.getMoney());
        values1.put(WHO,infomation.getHow());

        db.insert(TABLE_NAME1,null,values1);
        db.close();
        Log.d("DBManager", "successful: ");
    }
    public List<Infomation> getInfomation(){
        List<Infomation> listInfomation = new ArrayList<>();
        String selectQuery = "SELECT  * FROM " + TABLE_NAME1;

        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);

        if (cursor.moveToFirst()) {
            do {
                Infomation infomation = new Infomation();
                infomation.setmID(cursor.getInt(0));
                infomation.setNumbercost(cursor.getDouble(1));
                infomation.setGroups(cursor.getString(2));
                infomation.setNote(cursor.getString(3));
                infomation.setDate(cursor.getString(4));
                infomation.setMoney(cursor.getString(5));
                infomation.setHow(cursor.getString(6));
                listInfomation.add(infomation);

            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return listInfomation;
    }
    public int deleteInfomation(int id){
        SQLiteDatabase db = this.getWritableDatabase();
        return db.delete(TABLE_NAME1,ID+"=?",new String[]{String.valueOf(id)});
    }
    public void hello(){
        Toast.makeText(context, "HELLO", Toast.LENGTH_SHORT).show();
    }
}
