// supabase.js
import { createClient } from '@supabase/supabase-js'

const supabaseUrl = 'https://yykjftdovkjuvwgyzzig.supabase.co'
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inl5a2pmdGRvdmtqdXZ3Z3l6emlnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTA1MDkxMjMsImV4cCI6MjAwNjA4NTEyM30.QcnhrOvQTGUG9-BoS9Q0RI-M3c15X3Z4LqpZ5FtZAcg'
const supabase = createClient(supabaseUrl, supabaseKey)

export default supabase
